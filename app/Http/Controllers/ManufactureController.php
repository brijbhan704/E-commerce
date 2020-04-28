<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class ManufactureController extends Controller
{
    
    public function checkAuth()
        {
            // $this->checkAuth();
            $admin_id = Session::get('admin_id');
            if($admin_id) {
                return;
            }else{
                return Redirect::to('/admin')->send();
            }
         }


    public function index()
    {   
        $this->checkAuth();
         $datas = Manufacture::all();
       // return ($data);die;
        return view('admin.all_brand',compact('datas'));
    }

    
    public function create()
    {
        $this->checkAuth();
       return view('admin.add_brand');
    }

    
    public function store(Request $request)
    {

         $add_brand = DB::table('tbl_manufacture')->insert([
                'manufacture_name'                 =>$request->manufacture_name,
                'manufacture_description'          => $request->manufacture_description, 
                'publication_status'               => $request->publication_status                                                  
              ]);      
            if($add_brand){
            $request->session()->flash('message', '"'.$request->input('manufacture_name').'" Brand Added Successfully');
            return redirect('all_brand');
            }else{
            $request->session()->flash('error', '"'.$request->input('manufacture_name').'" Brand not added');
            return redirect('add_brand');
        }
    }


    public function unactive_brand($manufacture_id)
    {
            $this->checkAuth();
           // echo $manufacture_id;  die;
            $data = Db::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['publication_status'=>0]);
            return redirect('all_brand')->with('message',' Status Change Successfully');;
    }


    public function active_brand($manufacture_id)
    {
            $this->checkAuth();
            //echo $manufacture_id;  die;
            $data = Db::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['publication_status'=>1]);
            return redirect('all_brand')->with('message',' Status Change Successfully');
    }
    
    public function show(Manufacture $manufacture)
    {
        //
    }

    
    public function edit ($manufacture_id)
    {
         $datas = DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)
        ->first();    
        return view('admin.edit_brand',compact('datas'));
        //echo $category_id;
    }

   
    public function update(Request $request, $manufacture_id)
    {
        $manufacture_name = $request->manufacture_name;
        $manufacture_description = $request->manufacture_description;
        $update = DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['manufacture_name'=>$manufacture_name,'manufacture_description'=>$manufacture_description]);
         return redirect('all_brand')->with('message',' Brand Update Successfully');
    }

   
    public function destroy( $manufacture_id)
    {
        $delete = DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->delete();
       return redirect('all_brand')->with('error',' Brand Deleted Successfully');
    }
}
