<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin_login');
    }

     


    public function dashboard(Request $request){
    	$admin_email = $request->input('admin_email');
    	$admin_password =md5($request->input('admin_password'));
    	$result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
    	if ($result) {

    		Session::put('admin_name',$result->admin_name);

    		Session::put('admin_id',$result->admin_id);

    		return Redirect::to('/dashboard');
    		
    	}else{
    		return redirect()->back()->with('message', 'Email Or Password is Incorrect');
    		//return Redirect::to('/admin');
    	}

    	
    }
}
