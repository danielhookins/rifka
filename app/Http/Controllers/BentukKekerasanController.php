<?php namespace rifka\Http\Controllers;

use rifka\Http\Controllers\CaseDetailController;
use rifka\BentukKekerasan;

class BentukKekerasanController extends CaseDetailController {

	// Find by Id
	public function findById($id)
	{
		return BentukKekerasan::findOrFail($id);
	}

	// Get the type
	public function getType()
	{
		return "bentukKekerasan";
	}

	// Get an array of the editable fields
	public function getFields()
	{
		return ['emosional',
						'fisik',
						'ekonomi',
						'seksual',
						'sosial',
						'keterangan'];
	}

	/**
	 * [Override] Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($kasus_id)
	{
		if($bentuk = \rifka\BentukKekerasan::create([
			'kasus_id' => $kasus_id,
			'emosional' => \Input::get('emosional'),
			'fisik' => \Input::get('fisik'),
			'ekonomi' => \Input::get('ekonomi'),
			'seksual' => \Input::get('seksual'),
			'sosial' => \Input::get('sosial'),
			'keterangan' => \Input::get('keterangan'),
		]))
		{
			return redirect()->route('kasus.show', [$kasus_id, '#bentukkekerasan']);
		}
		// TODO: display error in message on show kasus page
		return 'Error, could not create new bentuk kekerasan';
	}

	/**
	 * [Override] Update the specified resource in storage.
	 *
	 * @param $kasus_id
	 * @param $bentuk_id
	 * @return Response
	 */
	public function update($kasus_id, $bentuk_id)
	{
		if ($bentuk = \rifka\BentukKekerasan::find($bentuk_id))
		{
			$bentuk->emosional 
				= (\Input::get('emosional')) ? \Input::get('emosional') : null;
			$bentuk->fisik
				= (\Input::get('fisik')) ? \Input::get('fisik') : null;
			$bentuk->ekonomi
				= (\Input::get('ekonomi')) ? \Input::get('ekonomi') : null;
			$bentuk->seksual
				= (\Input::get('seksual')) ? \Input::get('seksual') : null;
			$bentuk->sosial
				= (\Input::get('sosial')) ? \Input::get('sosial') : null;
			$bentuk->keterangan
				= (\Input::get('keterangan')) ? \Input::get('keterangan') : null;
			$bentuk->save();
			// TODO: If everything is empty (all checks unchecked and text empty-> delete record)
			return redirect()->route('kasus.show', [$kasus_id, "#bentukkekerasan"]);
		}
		// TODO: display error in message on show kasus page
		return 'Error, could not update bentuk kekerasan.';
	}
	
}
