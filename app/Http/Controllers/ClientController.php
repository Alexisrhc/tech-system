<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * validate data of request
     * @param  [Request] $request data
     * @param  [String] $documents number documents
     * @return [Function]  function validator
     */
    private function validation (Request $request, $documents) {
        if ($documents !== null) {
            $unique = Rule::unique('clients')->ignore($request->document, 'document');
        } else {
            $unique = 'unique:clients|required';
        }
        $validator = $request->validate([
            'document' =>  $unique,
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
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
        $clients = DB::table('clients')->paginate(10);
        return view('client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $this->validation($request, null);
        $client = new Client;
        $client->document = $request->type_document.$request->document;
        $client->name = $request->name;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->save();
        return redirect('client')->with('success', 'Agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = DB::table('clients')->where('document', $id)->get();
        return response()->json($client, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = DB::table('clients')->where('id_client', $id)->get();
        return view('client.edit', compact('client'));
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
         DB::table('clients')->where('id_client', $id)->update([
            'document' => $request->document,
            'name' => $request->name,
            'lastname'=> $request->lastname,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address
        ]);
        return redirect('client')->with('success', 'Modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('clients')->where('id_client', $id)->delete();
        //mandar mensaje de succes
        return redirect('client')->with('success', 'Eliminado exitosamente');
    }
}

//estas viendo eso????
