<?php

namespace App\Http\Controllers;

use App\provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProviderController extends Controller
{
    /**
     * validate data of request
     * @param  [Request] $request data
     * @param  [String] $documents number documents
     * @return [Function]  function validator
     */
    private function validation (Request $request, $documents) {
        if ($documents !== null) {
            $unique = Rule::unique('providers')->ignore($request->type_document.$request->rif, 'rif');
        } else {
            $unique = 'unique:providers|required';
        }
        $validator = $request->validate([
            'rif' =>  $unique,
            'business_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'bank' => 'required',
            'bank_account' => 'required',
            'name_bank_account' => 'required',
            'id_bank_account' => 'required',
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
        $providers = DB::table('providers')->paginate(10);
        return view('provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.create');
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
        $provider = new Provider;
        $provider->rif = $request->type_document.$request->rif;
        $provider->business_name = $request->business_name;
        $provider->contact = $request->contact;
        $provider->name = $request->name;
        $provider->address = $request->address;
        $provider->phone = $request->phone;
        $provider->email = $request->email;
        $provider->bank = $request->bank;
        $provider->bank_account = $request->bank_account;
        $provider->name_bank_account = $request->name_bank_account;
        $provider->id_bank_account = $request->id_bank_account;
        $provider->save();
        return redirect('provider')->with('success', 'Agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = DB::table('providers')->where('id_provider', $id)->get();
        return view('provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validation($request, $id);
         DB::table('providers')->where('id_provider', $id)->update([
            'rif' => $request->rif,
            'business_name' => $request->business_name,
            'contact'=> $request->contact,
            'name'=> $request->name,
            'address'=> $request->address,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'bank'=> $request->bank,
            'bank_account'=> $request->bank_account,
            'name_bank_account'=> $request->name_bank_account,
            'id_bank_account'=> $request->id_bank_account,
        ]);
        return redirect('provider')->with('success', 'Modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('providers')->where('id_provider', $id)->delete();
        return redirect('provider')->with('success', 'Eliminado exitosamente');
    }
}
