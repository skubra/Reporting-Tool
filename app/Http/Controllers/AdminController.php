<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;
use DB;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
    	$users=User::all();
    	$reports=Report::all();

        $activeuser=count(DB::select( DB::raw("SELECT * FROM users WHERE active = :aktif"), array('aktif' => 'Aktif')));

    	return view('pages.adminpages.admin',compact('users','reports','activeuser'));
    }
}
