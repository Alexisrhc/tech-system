<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = DB::table('bills')
            ->select(
                'clients.name as nameClient',
                'clients.lastname',
                'clients.email',
                'clients.address',
                'bills.id_bill',
                'bills.created_at',
                'bills.status',
                'bills.id_bill_temporal',
                'users.name as nameUser',
                'users.lastname as lastnameUser'
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
            ->paginate(10);
        return view('bill.index', compact('bills'));
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
        // $this->validation($request, null);
        $bills = new Bill;
        $activity = new Activity;
        $activity->id_user = $request->id_user;
        $activity->activity = 'Proceso de factura #'.$request->id_bill_temporal;
        $bills->id_user = $request->id_user;
        $bills->id_client = $request->id_client;
        $bills->id_bill_temporal = $request->id_bill_temporal;
        $bills->id_store = $request->id_store;
        $bills->status = $request->status;
        $bills->save();
        $activity->save();
        return response()->json($bills);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $bills = new Bill;
        $bills->where('id_bill', $id)->update($request->all());
        return response()->json($bills);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('bills')->where('id_bill', $id)->delete();
        return redirect('bill')->with('success', 'Eliminado exitosamente');
    }
}
