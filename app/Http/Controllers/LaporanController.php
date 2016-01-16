<?php namespace rifka\Http\Controllers;

use Illuminate\Http\Request;
use rifka\Http\Requests;
use rifka\Http\Controllers\Controller;
use rifka\Library\LaporanUtils;

class LaporanController extends Controller
{
    
    public function __construct()
    {
        // Only allow authenticated users
        $this->middleware('auth');
        
        // Only allow active users
        $this->middleware('active');

        // Grant access to counsellors, managers and developers
        $this->middleware('userType:Konselor');
    }

    // Overview page
    public function index()
    {
        $overview = LaporanUtils::getOverview();

        return view('laporan.index')
            ->with('overview', $overview);
    }

}
