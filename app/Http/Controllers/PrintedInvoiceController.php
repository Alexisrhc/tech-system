<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintedInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $printedinvoice = DB::table('bills')->where('id_bill', $id)->first();
        $user = DB::table('users')->where('id', 1)->first();
        $client = DB::table('clients')->where('id_client', $printedinvoice->id_client)->first();
        echo $printedinvoice;
        return view('printed-invoice.index', compact('printedinvoice','user','client'));
    }
    /*
     * funcion para imprimir
     */
    public function imprimir(Request $request, $id){
        // aqui actualizamos el estado de la factura enviada a imprimir
        $bills = DB::table('products')
            ->select(
                'id_bill_detail',
                'clients.name as nameUser',
                'clients.lastname',
                'clients.email',
                'clients.address',
                'products.id_product',
                'products.serial_product',
                'products.smart_card',
                'products.model',
                'products.name',
                'products.description',
                'products.price',
                'bills.id_bill_temporal',
                'bills.created_at',
                'bill_details.quantity'
                // DB::raw('SUM(bill_details.quantity) as quantity')
            )
            // ->groupBy('bill_details.id_bill_detail')
            ->join(
                'bill_details',
                'bill_details.id_product',
                'products.id_product'
            )
            ->join(
                'bills',
                'bill_details.id_bill_temporal',
                'bills.id_bill_temporal'
            )
            ->join(
                'users',
                'users.id',
                'bills.id_user'
            )
            ->join(
                'clients',
                'clients.id_client',
                'bills.id_client',
            )
            ->where('bills.id_bill_temporal', '=', $id)
            ->get();

        $total = 0;
        foreach ($bills as $key => $value) {
            $bills[$key]->price_total = $bills[$key]->price * $bills[$key]->quantity;
            $total += $bills[$key]->price_total;
        };
        if (isset($request->bills) && $request->bills) {
            return response()->json(['bills' => $bills, 'total'=> $total]);
        }
        $this->update($id);

        # code...
        $pdf = \PDF::loadView('printed-invoice.printed', compact('bills', 'total'));
        // return $pdf->download('printed.pdf');
        return $pdf->stream('printed.pdf');
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
    public function update($id)
    {
        DB::table('bill_temporals')->where('id_bill_temporal', $id)->update([
            'status' => 'paid',
        ]);
        DB::table('bills')->where('id_bill_temporal', $id)->update([
            'status' => 'paid',
        ]);
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
