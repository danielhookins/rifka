<?php

namespace rifka\Http\Controllers;

use Illuminate\Http\Request;

use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Symptom;
use rifka\Library\InputUtils;
use rifka\Library\ResourceUtils;

class SymptomController extends Controller
{

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store($kasus_id)
    {
        // Set variables
        $resourceType = "Symptom";
        $input = \Input::get();
        $fields = ["symptom_description"];

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
    public function edit(Request $request, $kasus_id, $symptom_id)
    {
        $symptom = Symptom::findOrFail($symptom_id);

        $request->session()->flash('edit-symptom', True);
        $request->session()->flash('symptom-active', $symptom);

        return redirect()->route('kasus.show', [$kasus_id, '#symptom']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($kasus_id, $symptom_id)
    {
        // Set variables
        $resource = Symptom::findOrFail($symptom_id);
        $fields = ["symptom_description"];
        $input = InputUtils::nullifyDefaults(\Input::get());
        
        try {
            ResourceUtils::updateResource($resource, $fields, $input);

            // resource updated
            return redirect()->route('kasus.show', [$kasus_id, '#symptom']);

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

    public function deleteSymptom2($kasus_id)
    {
        if($toDelete = \Input::get('toDelete'))
        {
            foreach($toDelete as $symptom_id)
            {
                $deleted = Symptom::where('symptom_id', $symptom_id)
                        ->where('kasus_id', $kasus_id)->delete();
            }
        }

        return redirect()->route('kasus.show', [$kasus_id, '#symptom']);
    }

}
