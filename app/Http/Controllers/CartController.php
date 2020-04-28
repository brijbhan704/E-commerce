<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    
    public function add_to_cart(Request $request)
    {
        $qty = $request->qty;
        $product_id = $request->product_id;
        $product_info = DB::table('tbl_products')->where('product_id',$product_id)->first();
        /*echo "<pre>";
       print_r($product_info);die;*/

       $data['qty'] = $qty;
       $data['id']=$product_info->product_id;
       $data['name']=$product_info->product_name;
       $data['price']=$product_info->product_price;
       $data['options']['image']=$product_info->product_image;
       
       Cart::add($data);
       return Redirect::to('/show_cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_cart()
    {
        $all_publish_category = DB::table('tbl_category')->where('publication_status',1)->first();

        $manage_publish_category = view('pages.add_to_cart')
        ->with('all_publish_category',$all_publish_category);
        return view('layout')->with('pages.add_to_cart',$manage_publish_category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete_cart($rowId)
    {
        Cart::update($rowId,0);
         return Redirect::to('/show_cart');

       //echo $rowId;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update_cart(Request $request)
    {
        $qty = $request->quantity;
        $rowId = $request->rowId;
       Cart::update($rowId,$qty);
         return Redirect::to('/show_cart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
