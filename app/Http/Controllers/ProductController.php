<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->paginate(12);

        return view('products/index', compact('products'));
    }

    public function details($id)
    {
        $product = Product::with('category')->find($id);
        return view('products/product', compact('product'));
    }
    public function fillModal($id)
    {
        $product = Product::find($id);
        return $product;
    }
    public function fillCart2(Request $request)
    {
        $session = Session::get('cart');
        $new = Array(
            'id' => $request->id,
            'qtd' => $request->qtd,
            'val' => $request->val,
            'total' => $request->total);
dd($session, $new);
        if(!empty($session)){
            array_push($session, $new);
            Session::put('cart',[
                $session
            ]);
        }else{
            Session::put('cart',[
                $new
            ]);
        }
        return Session::get('cart');
    }
    public function fillCart(Request $request)
    {
        $session = Session::get('cart');
        $new = Array(
            'id' => $request->id,
            'qtd' => $request->qtd,
            'val' => $request->val,
            'total' => $request->total);

        if(!empty($session)){
            array_push($session, $new);
            Session::put('cart', $session);
        }else{
            Session::flush();
            $request->session()->flush();
            Session::put('cart', [$new]);
        }
        return Session::get('cart');
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
