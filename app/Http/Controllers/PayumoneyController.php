<?php

namespace App\Http\Controllers;

use Softon\Indipay\Facades\Indipay;
use Illuminate\Http\Request;

class PayumoneyController extends Controller
{
   public function payumoney(Request $request)
        {
            //echo 1;die;
             $parameters = [
                    'txnd' => 10000001,
                    'order_id' => 10000001,
                    'amount' => 1200,
                    'firstname' => 'Brijbhan',
                    'lastname' => 'Tiwari',
                    'phone' =>8573992385,
                    'productinfo'=>676666,
                    'email' => 'tiwari018@gmail.com',
                    'city' =>'Noida',
                    'zipcode'=>1233445,
                    'state' =>'UP',
                    'country' =>'india',
                    'address1' => 'Nirala Estate',
                    'address2'=>'Nirala',
                    'curl' => url('payumoney/response'),

                  ];
                   $response = Indipay::response($request);
                   $order = Indipay::prepare($parameters);
                    echo 1;die;
                   print_r($order);die;
                  return Indipay::process($order);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
