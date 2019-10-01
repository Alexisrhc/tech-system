<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * validate data of request
     * @param  [Request] $request data
     * @param  [String] $documents number documents
     * @return [Function]  function validator
     */
    private function validation (Request $request, $code) {
        if ($code !== null) {
            $unique = Rule::unique('products')->ignore($request->id_product, 'id_product');
        } else {
            $unique = 'unique:products|required';
        }
        $validator = $request->validate([
            'code_product' => $unique,
            'serial_product' => 'required',
            'name' => 'required',
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
        $products = DB::table('products')->paginate(10);
        return view('product.index', compact('products'));
    }

    public function listProduct () {
        $products = DB::table('products')->get();
        return response()->json($products, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
        $product = new Product;
        $product->serial_product = $request->serial_product;
        $product->code_product = $request->code_product;
        $product->smart_card = $request->smart_card;
        $product->model = $request->model;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();
        return redirect('product')->with('success', 'Agregado exitosamente');
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
        $product = DB::table('products')->where('id_product', $id)->get();
        return view('product.edit', compact('product'));
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
         DB::table('products')->where('id_product', $id)->update([
            'code_product' => $request->code_product,
            'serial_product' => $request->serial_product,
            'smart_card' => $request->smart_card,
            'model'=> $request->model,
            'name'=> $request->name,
            'description'=> $request->description,
            'quantity'=> $request->quantity,
            'price'=> $request->price,
        ]);
        return redirect('product')->with('success', 'Modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where('id_product', $id)->delete();
        return redirect('product')->with('success', 'Eliminado exitosamente');
    }
}
