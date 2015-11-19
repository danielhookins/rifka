<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rifka\Alamat;
use rifka\AlamatKlien;
use rifka\Library\AlamatUtils;

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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($klien_id)
	{
		
		try {

			// set variables from user input
			$alamat = \Input::get('alamat');
			$kecamatan = \Input::get('kecamatan');
			$kabupaten = \Input::get('kabupaten');
			$jenis = (\Input::get('jenis') == "Jenis") ? null : \Input::get('jenis');
			$existing = AlamatUtils::getExisting($alamat, $kecamatan, $kabupaten);

			if($existing != null)
			{
				
				// Address already exists in database
				$alamat = $existing;
			}
			else 
			{
				
				// Create new address in database
				$alamat = \rifka\Alamat::create([
						'klien_id' 		=> $klien_id,
						'alamat' 		=> $alamat,
						'kecamatan' 	=> $kecamatan,
						'kabupaten'  => $kabupaten
					]);
			}
			
			// Create new klien-address association
			$alamatKlien = \rifka\AlamatKlien::create([
					'klien_id' => $klien_id,
					'alamat_id' => $alamat->alamat_id,
					'jenis' => $jenis
				]);

			return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);

		} catch (Exception $e) {

			// Could not save new address in DB
			return $e;
		}

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

		try {
			
			// Update the address
			$alamat = Alamat::find($alamat_id);
			$alamat->alamat = \Input::get('alamat');
			$alamat->kecamatan = \Input::get('kecamatan');
			$alamat->kabupaten = \Input::get('kabupaten');
			$alamat->save();

			// Update the 'type' on the pivot table
			$alamatKlien = AlamatKlien::Where('klien_id', $klien_id)
				->Where('alamat_id', $alamat_id)->first();
			$alamatKlien->jenis = \Input::get('jenis');
			$alamatKlien->save();
			
			// redirect back to client page
			return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);

		} catch (Exception $e) {

			// Could not update address
			return $e;
		}

	}

	/**
	 *	Delete Selected Addresses
	 */
	public function deleteAlamat2($klien_id)
	{
			
		// Items are selected for deletion
		if($toDelete = \Input::get('toDelete'))
		{
			try {

				foreach($toDelete as $alamat_id)
				{
					
					// Delete Client-Address record
					$deletedAlamatKlien = 
						AlamatKlien::where('alamat_id', $alamat_id)
							->where('klien_id', $klien_id)->delete();

					// Delete address if no-clients are associated with it
					// (Garbage Collection)
					if(!AlamatUtils::hasClients($alamat_id))
					{
						$deletedAlamat = Alamat::where('alamat_id', $alamat_id)
							->delete();
					}
					
				}
				
				return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);

			} catch (Exception $e) {

			// Could not delete address
			return $e;
			}

		} else {

			// No items were selected for deletion
			return redirect()->back();
		}

	}

}
