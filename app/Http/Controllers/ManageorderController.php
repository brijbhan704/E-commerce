<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class ManageorderController extends Controller
{
   
    public function index()
    {
        $manageProduct = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_order_detail','tbl_order_detail.order_id','=','tbl_order.order_id')
        ->select('tbl_order.*','tbl_customer.customer_name','tbl_order_detail.order_number')
        ->get();
        /*echo "<pre>";
        print_r($manageProduct);die;*/
        return view('admin.manage_order',compact('manageProduct'));
    }

    
    public function show_product(Request $request ,$order_id)
    {
       $viewProducts = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_order_detail','tbl_order_detail.order_id','=','tbl_order.order_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
         ->join('tbl_payment','tbl_payment.payment_id','=','tbl_order.payment_id')
        ->where('tbl_order.order_id',$order_id)
        ->select('tbl_order.*','tbl_order_detail.*','tbl_customer.*','tbl_shipping.*','tbl_payment.*')
        ->get();
       /* echo "<pre>";
        print_r($viewProducts);die*/;
      return view('admin.view_order',compact('viewProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
