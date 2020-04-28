<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class SuperAdminController extends Controller
{

	 public function index(Request $request)
	 {		
	 		$this->checkAuth();
    		return view('admin.dashboard');

    }

    public function logout()
    {
    	Session::flush();
    	return Redirect::to('/admin');
    }

    public function checkAuth()
    {
    	$admin_id = Session::get('admin_id');
    	if($admin_id) {
    		return;
    	}else{
    		return Redirect::to('/admin')->send();
    	}
    }
}
