<?php

namespace rifka\Http\Controllers;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;

class LayananDiberikanController extends Controller
{
    
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

        // Grant access to counsellors, managers and developers
        $this->middleware('userType:Konselor');
    }

    /**
     * Show the form for creating a new Layanan Diberikan.
     *
     * @param  $kasus_id
     * @return redirect to the show Kasus page
     */
    public function create(Request $request, $kasus_id)
    {
        $pageStatus = $_GET['jenis']."-baru";
        $request->session()->flash($pageStatus, True);

        return redirect()->route('kasus.show', [$kasus_id, '#layanan-diberikan']);
    }

}
