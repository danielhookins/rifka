<?php namespace rifka\Http\Controllers;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

class LitigasiController extends Controller
{
    
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Only allow authenticated users
        $this->middleware('auth');
        
        // Only allow active users
        $this->middleware('active');

        // Grant access to counsellors, managers and developers
        $this->middleware('userType:Konselor');
    }

    /**
     * Show the form for creating a new Litigasi record.
     */
    public function create(Request $request, $kasus_id)
    {
        $pageStatus = $_GET['jenis']."-baru";
        $request->session()->flash($pageStatus, True);

        return redirect()->route('kasus.show', [$kasus_id, '#litigasi']);
    }

}
