<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Report;

class MenuController extends Controller
{
	public function index(){
		$menus=Menu::all();
		$reports=Report::all();
        return view ('pages.userpages.home',compact('menus','reports'));
	}

}
