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
        $bill_detail->id_bill_temporal = $request->id_bill_temporal;
        $bill_detail->id_product = $request->id_product;
        $bill_detail->quantity = $request->quantity;
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
            ->select(
                'id_bill_detail',
                'products.id_product',
                'products.serial_product',
                'products.smart_card',
                'products.model',
                'products.name',
                'products.description',
                'products.price',
                'bill_details.quantity'
            )
            ->join(
                'bill_details',
                'bill_details.id_product',
                '=',
                'products.id_product'
            )
            ->join(
                'bill_temporals',
                'bill_details.id_bill_temporal',
                '=',
                'bill_temporals.id_bill_temporal'
            )
            ->where('bill_temporals.status', 'active')
            ->where('bill_details.id_bill_temporal', '=', $id)
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
        $bill = new Bill_detail;
        $bill->where('id_bill_detail', $id)->delete();
        return response()->json(['message' => 'delete successfull']);
    }
}
