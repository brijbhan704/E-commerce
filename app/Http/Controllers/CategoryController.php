<?php

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class CategoryController extends Controller
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
        $datas = Category::all();
       // return ($data);die;
        return view('admin.all_category',compact('datas'));
    }

    
    public function create(Request $request)
    {
        $this->checkAuth();
        return view('admin.add_category');
    }

    
    public function store(Request $request)
    {
         $addproduct = DB::table('tbl_category')->insert([
                'category_name'                 =>$request->category_name,
                'category_description'          => $request->category_description, 
                'publication_status'            => $request->publication_status                                                   
              ]);      
            if($addproduct){
            $request->session()->flash('message', '"'.$request->input('category_name').'" Category Added Successfully');
            return redirect('all_category');
            }else{
            $request->session()->flash('error', '"'.$request->input('category_name').'" Category not added');
            return redirect('add_category');
        }
    }

    public function unactive_category($category_id)
    {
            $this->checkAuth();
            //echo $category_id;  
            $data = Db::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>0]);
            return redirect('all_category')->with('message',' Status Change Successfully');;
    }


    public function active_category($category_id)
    {
            $this->checkAuth();
            //echo $category_id;  
            $data = Db::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>1]);
            return redirect('all_category')->with('message',' Status Change Successfully');
    }
    
    public function show($id)
    {
        //
    }

    
    public function edit(Request $request,$category_id)
    {
        $datas = DB::table('tbl_category')->where('category_id',$category_id)
        ->first();    
        return view('admin.edit_category',compact('datas'));
        //echo $category_id;
    }

    
    public function update(Request $request,$category_id)
    {
        $category_name = $request->category_name;
        $category_description = $request->category_description;
        $update = DB::table('tbl_category')->where('category_id',$category_id)->update(['category_name'=>$category_name,'category_description'=>$category_description]);
         return redirect('all_category')->with('message',' Category Update Successfully');
    }

   
    public function destroy(Request $request,$category_id)
    {
        $delete = DB::table('tbl_category')->where('category_id',$category_id)->delete();
       return redirect('all_category')->with('error',' Category Deleted Successfully');
    }
}
