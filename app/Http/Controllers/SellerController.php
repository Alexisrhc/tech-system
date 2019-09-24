<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SellerController extends Controller
{
    /**
     * validate data of request
     * @param  [Request] $request data
     * @param  [String] $documents number documents
     * @return [Function]  function validator
     */
    private function validation (Request $request, $documents) {
        if ($documents !== null) {
            // $unique = Rule::unique('sellers')->ignore($request->document, 'document');
        } else {
            $unique = 'unique:users';
        }
        $validator = $request->validate([
            'document' =>  $unique,
            'code' =>  $unique,
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'string', 'confirmed']
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
        $Users = DB::table('users')->paginate(10);
        return view('seller.index', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.create');
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
        $seller = new User;
        $seller->code = $request->code;
        $seller->document = $request->document;
        $seller->name = $request->name;
        $seller->lastname = $request->lastname;
        $seller->email = $request->email;
        $seller->password = Hash::make($request->password);
        $seller->rol_user = $request->rol_user;
        $seller->save();
        return redirect('seller')->with('success', 'Agregado exitosamente');
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
        $seller = DB::table('users')->where('id', $id)->get();
        return view('seller.edit', compact('seller'));
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
