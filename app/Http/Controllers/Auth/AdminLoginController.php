<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin', ['except' => ['logout']]); //middleware logout'a etki etmeyecek
	}
    public function showLoginForm(){
    	return view('auth.admin-login');
    }
    public function login(Request $request){
    	if (Auth::guard('admin')->attempt(['sicilno' => $request->sicilno, 'password' => $request->password], $request->remember)) {
    		return redirect()->back();
    	}
    	return redirect()->back();
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
