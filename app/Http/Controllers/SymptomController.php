<?php

namespace rifka\Http\Controllers;

use rifka\Http\Controllers\CaseDetailController;
use rifka\Symptom;

class SymptomController extends CaseDetailController
{
    // Find by Id
    public function findById($id)
    {
        return Symptom::findOrFail($id);
    }

    // Get the type
    public function getType()
    {
        return "symptom";
    }

    // Get an array of the editable fields
    public function getFields()
    {
        return ["symptom_description"];
    }

}
