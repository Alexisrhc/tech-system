<?php

namespace App\Http\Controllers;

use App\Bill_detail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // AQUÍ EL AGREGAR
        $bill_detail = new Bill_detail;
        $bill_detail->id_bill = $request->id_bill;
        $bill_detail->id_product = $request->id_product;
        $bill_detail->quantity = $request->quantity;
        $bill_detail->price_total = $request->price_total;
        $bill_detail->save();
        return response()->json($bill_detail);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bills = DB::table('products')
            ->select('products.id_product','products.serial_product','products.smart_card','products.model','products.name','products.description','products.price','bill_details.quantity','bill_details.price_total')
            ->join('bill_details', 'bill_details.id_product', '=', 'products.id_product')
            ->where('bill_details.id_bill', '=', $id)
            ->get();

        foreach ($bills as $key => $value) {
            $bills[$key]->price_total = $bills[$key]->price * $bills[$key]->quantity;
        };
        return response()->json($bills);
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
