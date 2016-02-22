<?php namespace rifka\Http\Controllers\Alamat;

use rifka\Alamat;
use rifka\AlamatKlien;
use rifka\Library\AlamatUtils;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlamatController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Alamat Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles client address functionality.
	|
	*/

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($klien_id)
	{
		try {
			$data = AlamatUtils::getVariablesFromInput(\Input::get());
			$alamat = AlamatUtils::storeNewAddress($data);
			$alamatKlien = AlamatUtils::storeAlamatKlien($data, $klien_id);

			return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);
		} catch(Exception $e) { return $e; }
	}

	/**
	 * Show the form for editing the specified address.
	 *
	 * @param Request
	 * @param integer
	 * @param integer
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
	 * Update the specified client's address.
	 *
	 * @param integer
	 * @param integer
	 * @return Response
	 */
	public function update($klien_id, $alamat_id)
	{
		try {
			$data = AlamatUtils::getVariablesFromInput(\Input::get());
			AlamatUtils::updateClientAddress($klien_id, $alamat_id, $data);
			return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);
		} catch (Exception $e) { return $e; }
	}

	/**
	 * Delete selected addresses of specified client.
	 *
	 * @param integer
	 * @return Response
	 */
	public function deleteAlamat2($klien_id)
	{
		$toDelete = \Input::get('toDelete');
		
		if(sizeof($toDelete) < 1) return redirect()->back();

		try {
			foreach($toDelete as $alamat_id) {
				AlamatUtils::removeClientAddress($alamat_id, $klien_id);
			}
			return redirect()->route('klien.show', [$klien_id, '#informasi-kontak']);
		} catch (Exception $e) { return $e; }
	}

}
