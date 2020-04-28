<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class ProductController extends Controller
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
        /*$datas = DB::table('tbl_products')
        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
        ->get();
        echo "<pre>";
        print_r($datas);die;*/
        $datas = Product::all();
        //return ($datas);die;
        return view('admin.all_product',compact('datas'));
    }

    
    public function create()
    {
        $this->checkAuth();
         return view('admin.add_product');
    }

    
    public function store(Request $request)
    {

            $datas  = array();
            $datas['product_name']= $request->product_name;
            $datas['category_id']= $request->product_category;
            $datas['manufacture_id']= $request->product_brand;
            $datas['product_short_description']= $request->product_short_description;
            $datas['product_long_description']= $request->product_long_description;
            $datas['product_price']= $request->product_price;
            $datas['product_size']= $request->product_size;
            $datas['product_color']= $request->product_color;
            $datas['publication_status']= $request->publication_status;
            $image = $request->file('product_image');
            if ($image) {
           $destinationPath = 'img/productImg/'; // upload path
           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           /*$image_url = public_path($destinationPath.$profileImage);*/
           $image_url = $destinationPath.$profileImage;
           //return $image_url;die;
           $success = $image->move($destinationPath, $profileImage);
           if ($success) {
              $datas['product_image']=$image_url;
              DB::table('tbl_products')->insert($datas);
              return redirect('add_product')->with('message',' Product Add Successfully');
           }

           }
           $datas['product_image']='';
           DB::table('tbl_products')->insert($datas);
           return redirect('add_product')->with('message',' Product Add Successfully Without Image');
        
        }

    
        public function show(Product $product)
        {
            $this->checkAuth();
        }

        
         public function unactive_product($product_id)
        {
         // echo 1;die;
                $this->checkAuth();
                //echo $category_id;  
                $data = Db::table('tbl_products')->where('product_id',$product_id)->update(['publication_status'=>0]);
                return redirect('all_product')->with('message',' Status Change Successfully');;
        }


        public function active_product($product_id)
        {
                $this->checkAuth();
                //echo $category_id;  
                $data = Db::table('tbl_products')->where('product_id',$product_id)->update(['publication_status'=>1]);
                return redirect('all_product')->with('message',' Status Change Successfully');
        }
        
        
        public function edit($product_id)
        {
            /*$data = DB::table('tbl_products')->where('product_id',$product_id)
            ->first();*/  
            $data = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->where('product_id',$product_id)
            ->first();
        /*echo "<pre>";
           print_r($data);die;*/ 
           return view('admin.edit_product',compact('data'));
            //echo $category_id;
        }

        
        public function update(Request $request,$product_id)
        {
          //echo 1;die;
            $datas  = array();
            $datas['product_name']= $request->product_name;
            //$datas['category_id']= $request->product_category;
            //$datas['manufacture_id']= $request->product_brand;
            $datas['product_short_description']= $request->product_short_description;
            $datas['product_long_description']= $request->product_long_description;
            $datas['product_price']= $request->product_price;
            $datas['product_size']= $request->product_size;
            $datas['product_color']= $request->product_color;
            $datas['publication_status']= $request->publication_status;
            $image = $request->file('product_image');
            if ($image) {
           $destinationPath = 'img/productImg/'; // upload path
           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           /*$image_url = public_path($destinationPath.$profileImage);*/
           $image_url = $destinationPath.$profileImage;
           return $image_url;die;
           $success = $image->move($destinationPath, $profileImage);
           if ($success) {
              $datas['product_image']=$image_url;
              DB::table('tbl_products')->insert($datas);
              return redirect('add_product')->with('message',' Product Add Successfully');
           }

           }
           $datas['product_image']='';
           DB::table('tbl_products')->insert($datas);
           return redirect('add_product')->with('message',' Product Add Successfully Without Image');


            /*$product_name = $request->product_name;
            $product_short_description = $request->product_short_description;
            $product_long_description = $request->product_long_description;
            $product_price = $request->product_price;
            $product_size = $request->product_size;
            $product_color = $request->product_color;

            $category_description = $request->category_description;
            $update = DB::table('tbl_category')->where('category_id',$category_id)->update(['product_name'=>$product_name,'category_description'=>$category_description]);*/
             return redirect('all_category')->with('message',' Product Update Successfully');
        }

       
        public function destroy(Request $request,$product_id)
        {
            $delete = DB::table('tbl_products')->where('product_id',$product_id)->delete();
           return redirect('all_product')->with('error',' Product Deleted Successfully');
        }
}
