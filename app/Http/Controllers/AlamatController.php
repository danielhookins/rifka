<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Alamat;

class AlamatController extends Controller {

	/**
	 * Create a new controller instance.
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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($kasus_id)
	{
		return redirect('404');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($kasus_id)
	{
		return redirect('404');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($klien_id)
	{
		$alamat = \rifka\Alamat::create([
			'klien_id' 		=> $klien_id,
			'alamat' 		=> \Input::get('alamat'),
			'kecamatan' 	=> \Input::get('kecamatan'),
			'kabupaten'  => \Input::get('kabupaten')
		]);

		return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($kasus_id, $perkembangan_id)
	{

		return redirect('404');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $klien_id, $alamat_id)
	{
		$alamat = Alamat::findOrFail($alamat_id);

		$request->session()->flash('edit-alamat', True);
		$request->session()->flash('alamat-active', $alamat);

		return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($klien_id, $alamat_id)
	{

		$alamat = Alamat::findOrFail($alamat_id);
		$alamat->alamat = \Input::get('alamat');
		$alamat->kecamatan = \Input::get('kecamatan');
		$alamat->kabupaten = \Input::get('kabupaten');

		$alamat->save();

		return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($perkembangan_id)
	{
		//
	}

	public function deleteAlamat2($klien_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $alamat_id)
			{
				$deleted = Alamat::where('alamat_id', $alamat_id)
						->where('klien_id', $klien_id)->delete();
			}
		}

		return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);
	}

}
