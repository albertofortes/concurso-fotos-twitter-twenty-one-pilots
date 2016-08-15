<?php

namespace App\Http\Controllers;

use App\Contestant;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aContestant = [];

        $aContestants['all'] = DB::table('contestants')->count();
        $aContestants['preselected'] = DB::table('contestants')->where('status', '=', 'Preseleccionado')->count();
        $aContestants['finalists'] = DB::table('contestants')->where('status', '=', 'Finalista')->count();

        return view('admin.index', array('aContestants' => $aContestants));
    }
}
