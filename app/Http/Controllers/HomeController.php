<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{


    public function index()
    {
    	
        $all_publish_product = DB::table('tbl_products')
        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
        ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
        ->where('tbl_products.publication_status',1)
        ->limit(9)
        ->get();
       // echo "<pre>";
        //print_r($all_publish_product);die;
        $manage_publish_product = view('pages.home_content')
        ->with('all_publish_product',$all_publish_product);

        $all_published_slider = Slider::all();
    	return view('layout')->with('pages.home_content',$manage_publish_product,$all_published_slider);
    }


        public function showProductBy_Category($category_id)
        {
              $all_publish_category = DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->select('tbl_products.*','tbl_category.category_name')
                    ->where('tbl_category.category_id',$category_id)
                    ->where('tbl_products.publication_status',1)
                    ->limit(18)
                    ->get();
                   /*echo "<pre>";
                    print_r($all_publish_category);die;*/
                    /*$manage_category_product = view('pages.category_by_product')
                    ->with('all_publish_category',$all_publish_category);*/

                    return view('pages.category_by_product',compact('all_publish_category'));
                   
        }

        public function showProductBy_Manufacture($manufacture_id)
        {
            $all_publish_brands = DB::table('tbl_products')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_manufacture.manufacture_name')
                    ->where('tbl_manufacture.manufacture_id',$manufacture_id)
                    ->where('tbl_products.publication_status',1)
                    ->limit(18)
                    ->get();
            //return $all_publish_brands;
                    return view('pages.manufacture_by_product',compact('all_publish_brands'));
        }

         public function view_product($product_id)
         {      
            $all_product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_products.product_id',$product_id)
            ->where('tbl_products.publication_status',1)
            ->limit(9)
            ->first();
            /* echo "<pre>";
            print_r($all_product);die;*/
            /*$product_details = view('pages.product_details')
            ->with('all_product',$all_product);
            return view('layout')->with('pages.product_details',$all_product);*/
            return view('pages.product_details',compact('all_product'));
         }

}
