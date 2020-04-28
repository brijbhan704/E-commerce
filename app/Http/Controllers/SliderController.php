<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class SliderController extends Controller
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
    
    public function index(Request $request)
    {
        $this->checkAuth();
        $datas = Slider::all();
       // return ($data);die;
        return view('admin.all_slider',compact('datas'));
    }

    
    public function create(Request $request)
    {
        $this->checkAuth();
        return view('admin.add_slider');
    }

    
    public function store(Request $request)
    {
            $datas = array();
            $datas['publication_status']= $request->publication_status;
            $image = $request->file('slider_image');
            if ($image) {
           $destinationPath = 'img/sliderImg/'; // upload path
           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           /*$image_url = public_path($destinationPath.$profileImage);*/
           $image_url = $destinationPath.$profileImage;       
           $success = $image->move($destinationPath, $profileImage);
           if ($success) {
              $datas['slider_image']=$image_url;
              DB::table('tbl_slider')->insert($datas);
              return redirect('add_slider')->with('message',' Slider Add Successfully');
           }

           }
           $datas['slider_image']='';
           DB::table('tbl_slider')->insert($datas);
           return redirect('add_slider')->with('message',' Slider Add Successfully Without Image');
    }

    
    public function show(Slider $slider)
    {
        //
    }

    
    public function unactive_slider($slider_id)
    {
            $this->checkAuth();
            //echo $category_id;  
            $data = Db::table('tbl_slider')->where('slider_id',$slider_id)->update(['publication_status'=>0]);
            return redirect('all_slider')->with('message',' Status Change Successfully');;
    }


    public function active_slider($slider_id)
    {
            $this->checkAuth();
            //echo $category_id;  
            $data = Db::table('tbl_slider')->where('slider_id',$slider_id)->update(['publication_status'=>1]);
            return redirect('all_slider')->with('message',' Status Change Successfully');
    }
    
    
    public function edit(Request $request,$slider_id)
    {
        $datas = DB::table('tbl_slider')->where('slider_id',$slider_id)
        ->first();    
        return view('admin.edit_slider',compact('datas'));
        //echo $category_id;
    }

    
    public function update(Request $request,$slider_id)
    {
        $slider_image = $request->slider_image;
        $update = DB::table('tbl_category')->where('slider_id',$slider_id)->update(['slider_image'=>$slider_image]);
         return redirect('all_slider')->with('message',' Slider Update Successfully');
    }

   
    public function destroy(Request $request,$slider_id)
    {
        $delete = DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
       return redirect('all_slider')->with('error',' Slider Deleted Successfully');
    }
}
