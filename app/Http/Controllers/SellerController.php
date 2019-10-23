<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // if (Auth::user()->rol_user == 'admin') {
            # esto es si el logeado es admin debe hacer el EDIT
            if ($documents !== null) {
                $unique = Rule::unique('users')->ignore($request->document, 'document');
                $password = '';
            } else {
                $unique = 'unique:users|required';
                $password = 'required';
            }
        // }
        $validator = $request->validate([
            'document' =>  $unique,
            'code' =>  $unique,
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => [$password, 'confirmed']
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
        $Users = DB::table('users')->where('id', '!=', Auth::user()->id)->paginate(10);
        return view('employee.index', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
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
        $employee = new User;
        $employee->code = $request->code;
        $employee->document = $request->document;
        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->rol_user = $request->rol_user;
        $employee->save();
        return redirect('employee')->with('success', 'Agregado exitosamente');
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
        if(count($seller)>0){
            return view('employee.edit', compact('seller'));
        }else{
            abort(419);
            // return redirect('not-found');
        }
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
        $dataUser = [];
        if (!empty($request->password)) {
            $dataUser = [
                // 'code' => $request->code,
                // 'document'=> $request->document,
                'name'=> $request->name,
                'lastname'=> $request->lastname,
                'rol_user' => $request->rol_user,
                'password' => Hash::make($request->password),
            ];
        } else {
            $dataUser = [
                // 'code' => $request->code,
                // 'document'=> $request->document,
                'name'=> $request->name,
                'lastname'=> $request->lastname,
                'rol_user' => $request->rol_user,
            ];
        }
        DB::table('users')->where('id', $id)->update($dataUser);
        return redirect('employee')->with('success', 'Modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        //mandar mensaje de succes
        return redirect('employee')->with('success', 'Eliminado exitosamente');
    }

    public function selectSeller()
    {
        $sellers = DB::table('users')->get();
        return response()->json($sellers);
    }
}
