<?php namespace rifka\Http\Controllers\CaseDetail;

use rifka\Http\Controllers\CaseDetail\CaseDetailController;
use rifka\Symptom;

class SymptomController extends CaseDetailController {

  /*
  |--------------------------------------------------------------------------
  | Symptom Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles symptom resource functionality.
  |
  */

  /**
   * Retrieve the resource object by it's ID.
   *
   * @param integer $id
   * @return Symptom
   */
  public function findById($id) 
  {
    return Symptom::findOrFail($id);
  }

  /**
   * Get the type of Resource.
   *
   * @return string
   */
  public function getType() 
  {
    return "symptom";
  }

  /**
   * Get an array of the editable fields.
   *
   * @return Array
   */
  public function getFields() 
  {
    return ["symptom_description"];
  }

}
