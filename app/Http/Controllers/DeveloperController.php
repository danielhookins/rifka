<?php namespace rifka\Http\Controllers;

use rifka\Http\Requests;
use Illuminate\Http\Request;
use rifka\Http\Controllers\Controller;

class DeveloperController extends Controller
{

 /*
  |--------------------------------------------------------------------------
  | Developer Controller
  |--------------------------------------------------------------------------
  |
  | This is the controller for the developer.
  |
  */

    public function index()
    {
        return view('developer.index');
    }

    public function test()
    {
        return 'test';
    }

    public function postTest(Request $request)
    {
        return $request;
    }
}
