<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\MensProgram;
use Illuminate\Http\Request;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class MensProgramController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request, $kasus_id)
	{
        $request->session()->flash("mens_program-baru", True);

        return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($kasus_id)
	{
		// Set variables
		$resourceType = "MensProgram";
		$input = \Input::get();
		$fields = ["tanggal", "keterangan"];

		return ResourceUtils::storeResource($kasus_id, $resourceType, $input, $fields);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $kasus_id, $mens_program_id)
	{
		$mensProgram = MensProgram::findOrFail($mens_program_id);

		$request->session()->flash('edit-mens_program', True);
		$request->session()->flash('mens_program-active', $mensProgram);

		return redirect()->route('kasus.show', [$kasus_id, '#mens_program']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($kasus_id, $mensprogram_id)
	{
		// Set variables
		$resource = MensProgram::findOrFail($mensprogram_id);
		$fields = ["tanggal", "keterangan"];
		$input = InputUtils::nullifyDefaults(\Input::get());
		
		try {
			ResourceUtils::updateResource($resource, $fields, $input);

			// resource updated
			return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);

		} Catch (Exception $e) {
			// Could not update resource
			return $e;
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function deleteMensProgram2($kasus_id)
	{
		if($toDelete = \Input::get('toDelete'))
		{
			foreach($toDelete as $mens_program_id)
			{
				$deleted = MensProgram::where('mens_program_id', $mens_program_id)
						->where('kasus_id', $kasus_id)->delete();
			}
		}

		return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
	}

}
