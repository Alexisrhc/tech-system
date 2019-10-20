<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StoreController extends Controller
{
    private function validation (Request $request, $documents) {
        if ($documents !== null) {
            $unique = Rule::unique('stores')->ignore($request->name, 'document');
        } else {
            $unique = 'unique:stores|required';
        }
        $validator = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
        return $validator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = DB::table('stores')->paginate(10);
        return view('store.index', ['stores' => $stores]);
    }

    public function selectStore () {
        $stores = DB::table('stores')->get();
        return response()->json($stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request, null);
        $store = new Store;
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->save();
        return redirect('store')->with('success', 'Agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $store = DB::table('stores')->where('id_store', $id)->first();
        $request->session()->push('store', $store);
        return response()->json($store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = DB::table('stores')->where('id_store', $id)->get();
        return view('store.edit', compact('store'));
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
        $this->validation($request, $id);
         DB::table('stores')->where('id_store', $id)->update([
            'name' => $request->name,
            'address'=> $request->address
        ]);
        return redirect('store')->with('success', 'Modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('stores')->where('id_store', $id)->delete();
        return redirect('store')->with('success', 'Eliminado exitosamente');
    }
}
