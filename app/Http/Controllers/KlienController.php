<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\Controller;
use rifka\Klien;
use rifka\Activity;
use rifka\AttributeChange;
use Illuminate\Http\Request;
use Auth;
use DB;
use rifka\KlienKasus;
use rifka\Library\ExcelUtils;

class KlienController extends Controller {

	/**
	 * Create a new client controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Only allow authenticated users
		$this->middleware('auth');
		
		// Only allow active users
		$this->middleware('active');
	}

	/**
	 * Display a list of all clients.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Retrieve clients from database
		$semuaKlien = Klien::
			orderBy('klien_id', 'DESC')	// Order by most recent
			->paginate(15);							// Display 15 per page

		return view('klien.index', array(
			'search'	 	 => True, 			// Show the search widget
			'list'			 => True, 			// Show the list of clients
			'semuaKlien' => $semuaKlien // The complete list of clients available
			));
	}

	/**
	 * Show the form for creating a new client.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('klien.create');
	}

	/**
	 * Store a newly created client in the database.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// Validate input
		$this->validate($request, [
			'nama_klien' 		=> 'required',
			'kelamin' 			=> 'required',
			'tanggal_lahir' => 'date',
			'no_telp' 			=> 'numeric',
			'email' 				=> 'email'
			]);

		$returnPage = \Input::get('returnPage');

		// Ensure defaults are not stored in DB
		$tanggal_lahir = (\Input::get('tanggal_lahir') == null) 
			? null : \Input::get('tanggal_lahir');
		$agama = (\Input::get('agama') == "Agama")
			? null : \Input::get('agama');
		$status_perkawinan = (\Input::get('status_perkawinan') == "Status Perkawinan")
			? null : \Input::get('status_perkawinan');
		$penghasilan = (\Input::get('penghasilan') == "Penghasilan")
			? null : \Input::get('penghasilan');

		// Create new Client
		$klienBaru = Klien::create([
				'nama_klien' 				=> \Input::get('nama_klien'),
				'kelamin'						=> \Input::get('kelamin'),
				'tanggal_lahir' 		=> $tanggal_lahir,
				'agama' 						=> $agama,
				'status_perkawinan' => $status_perkawinan,
				'no_telp' 					=> \Input::get('no_telp'),
				'email' 						=> \Input::get('email'),
				'jumlah_anak'				=> \Input::get('jumlah_anak'),
				'jumlah_tanggungan' => \Input::get('tanggungan'),
				'pekerjaan' 				=> \Input::get('pekerjaan'),
				'jabatan' 					=> \Input::get('jabatan'),
				'penghasilan' 			=> $penghasilan,
				'kondisi_klien' 		=> \Input::get('kondisi_klien'),
				'dirujuk_oleh' 			=> \Input::get('dirujuk_oleh')
			]);

		// Create new Address
		$provinsi = \Input::get('provinsi');

		// Address is Yogyakarta
		if ($provinsi == 'Yogyakarta') 
		{
			$kecamatan = \Input::get('kecamatan');
			$kabupaten = \Input::get('kabupaten');
		} 
		// Address is not Yogyakarta
		else 
		{
			$kecamatan = '';
			$kabupaten = \Input::get('provinsi');
		}

		// Ensure defaults not stored in DB
		$kecamatan = ($kecamatan == "Kecamatan") ?
			null : $kecamatan;
		$kabupaten = ($kabupaten == "Kabupaten") ?
			null : $kabupaten;

		// If not all null - create address.		
		$alamat = \Input::get('alamat');
		if($alamat != null && $kecamatan != null && $kabupaten != null)
		{
			$alamatBaru = \rifka\Alamat::create([
					'alamat' 	=> $alamat,
					'klien_id' => $klienBaru->klien_id,
					'kecamatan' => $kecamatan,
					'kabupaten' => $kabupaten
				]);
		}
        
		if($returnPage == "klien") {
			return redirect('klien/'.$klienBaru->klien_id)
					->with('success', 'New client created.');
		}

		return redirect('404');
	}

	/**
	 * Display the specified Client
	 * with associated cases and addresses
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if($klien = Klien::find($id))
		{
			$kasus2 = Klien::find($id)->klienKasus;		// Get the client's cases
			$alamat2 = Klien::find($id)->alamatKlien;	// Get the client's addresses

			return view('klien.show', array(
				'klien' 	=> $klien,
				'kasus2'	=> $kasus2,
				'alamat2'	=> $alamat2));
		}

		return redirect('404');
	}

	/**
	 * Show the form for editing the specified client.
	 *
	 * @param  int  $klien_id
	 * @return Response
	 */
	public function edit(Request $request, $klien_id, $section = 'all')
	{
		if($section == 'kontak')
		{
			$request->session()->flash('edit-kontak', True);
			return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);
		}

		$klien = Klien::findOrFail($klien_id);
		$kasus2 = Klien::find($klien_id)->korbanKasus;

		return view('klien.edit', array(
			'klien' 	=> $klien,
			'kasus2'	=> $kasus2,
			'section' => $section));
	}

	/**
	 * Update the client in the database.
	 *
	 * @param  int  $klien_id
	 * @param  string $section The section of client data to update
	 * @return Response
	 */
	public function update($klien_id, $section = 'all')
	{

		/* 
		 * If the section is the Contact section 
		 * Update the telephone number and email address of the client
		 */
		if($section == "kontak")
		{
			$klien = Klien::findOrFail($klien_id);
			$klien->no_telp = \Input::get('no_telp');
			$klien->email = \Input::get('email');

			$klien->save();

			return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);
		}

		$user = Auth::user();
		$klien = Klien::findOrFail($klien_id);
		$attributes = array_keys($klien->getAttributes());

		// TODO: Fix Bug: If user clears an input it will not be updated.
		foreach($attributes as $attribute)
		{
			if(\Input::get($attribute) && $klien->$attribute != \Input::get($attribute))
			{
				$klien->$attribute = \Input::get($attribute);
				$klien->save();
			}
		}
        
		return redirect()->route('klien.show', $klien_id)
			->with('success', 'Klien file updated.');
	}

	/**
	 * Remove the specified client from the database.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($klien_id)
	{
		$klien = Klien::findOrFail($klien_id);
		$klienKasus2 = KlienKasus::where('klien_id', $klien_id);
		$user = Auth::user();

		foreach ($klienKasus2->select('kasus_id')->get() as $klienKasus)
		{
				$klienKasus->delete();
		}
		
		$klien->delete();
		// TODO: Make sure all the associated things are deleted too
		// (eg. the clients address)

		return redirect()->route('home')
			->with('success', 'Klien #'.$klien_id.' has been deleted.');
	}

	/**
	 * Show the confirm delete dialog
	 * asking the user if they really want to delete?
	 */
	public function confirmDestroy($klien_id)
	{
		return view('klien.destroy', array('klien_id' => $klien_id));
	}

	/**
	 *  Export a client's information to an Excel file
	 *
	 */
	public function exportXLS($klien_id)
	{
		return ExcelUtils::exportClientInfoXLS($klien_id);
	}

}