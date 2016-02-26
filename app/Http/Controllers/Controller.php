<?php namespace rifka\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

  /*
  |--------------------------------------------------------------------------
  | Base Controller
  |--------------------------------------------------------------------------
  |
  | This abstract class is the base controller.
  |
  */

	use DispatchesCommands, ValidatesRequests;

}
