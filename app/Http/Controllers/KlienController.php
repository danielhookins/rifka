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
use rifka\Library\AlamatUtils;
use rifka\Library\KlienUtils;
use rifka\DWKorbanKasus;

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
		$pendidikan = (\Input::get('pendidikan') == "Pendidikan")
			? null : \Input::get('pendidikan');

		// Create new Client
		$klienBaru = Klien::create([
				'nama_klien' 				=> \Input::get('nama_klien'),
				'nama_orangtua'			=> \Input::get('nama_orangtua'),
				'kelamin'						=> \Input::get('kelamin'),
				'tanggal_lahir' 		=> $tanggal_lahir,
				'agama' 						=> $agama,
				'status_perkawinan' => $status_perkawinan,
				'no_telp' 					=> \Input::get('no_telp'),
				'email' 						=> \Input::get('email'),
				'pendidikan'				=> $pendidikan,
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
		$kecamatan = ($kecamatan == "Kecamatan") ? null : $kecamatan;
		$kabupaten = ($kabupaten == "Kabupaten") ? null : $kabupaten;
		$jenis = (\Input::get('jenis') == "Jenis") ? null : \Input::get('jenis');

		// If not all null - create address - and alamat_klien association.		
		$alamat = \Input::get('alamat');
		if($alamat != null && $kecamatan != null && $kabupaten != null)
		{
			
			try {
				
				//TODO: Move this duplicate code to library
				// Duplicate with AlamatController 

				// Check if address already exists
				if(($existing = AlamatUtils::
						getExisting($alamat, $kecamatan, $kabupaten)) != null)
				{
					// Define as existing address
					$alamatBaru = $existing;
				} 
				else 
				{
					// Create new address
					$alamatBaru = \rifka\Alamat::create([
						'alamat' 	=> $alamat,
						'kecamatan' => $kecamatan,
						'kabupaten' => $kabupaten
					]);
				}
				
				// Create new Client-Address association
				$alamatKlienBaru = \rifka\AlamatKlien::create([
						'alamat_id' => $alamatBaru->alamat_id,
						'klien_id' => $klienBaru->klien_id,
						'jenis' => $jenis
					]);

			} catch (Exception $e) {
				
				// Could not create new address and/or associations.
				return $e;
			}
			
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
				'user'		=> Auth::User(),
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
	public function update($klien_id)
	{
		$input = \Input::get();
		$fields = null;

		// Update based on specific section
		if(isset($input["submitBtn"])) 
		{
			
			// Pribadi (Personal) section
			if($input["submitBtn"] == "informasi-pribadi")
			{
				$fields = array('nama_klien', 'nama_orangtua', 'kelamin', 'tanggal_lahir', 'agama', 'status_perkawinan');
			}
			// Kontak (Contact) section
			elseif($input["submitBtn"] == "informasi-kontak")
			{
				$fields = array('no_telp', 'email');
			}
			// Tambahan (Additional) section
			elseif($input["submitBtn"] == "informasi-tambahan")
			{
				$fields = array('jumlah_anak', 'pendidikan', 'pekerjaan', 'jabatan', 'penghasilan', 'kondisi_klien', 'dirujuk_oleh');
			}

			try {
				// Update client
				return KlienUtils::updateKlien($klien_id, $fields, $input);
			
			} catch (Exception $e) {

				// Error - could not update client
				return $e;
			}


		} else {

			// No section specified - cannot update
			return redirect()->back();
		}

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
		
		// Delete client and remove from Data Warehouse
		$klien->delete();
		$deletedDataWarehouse = DWKorbanKasus::where('klien_id', $klien_id)->delete();

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