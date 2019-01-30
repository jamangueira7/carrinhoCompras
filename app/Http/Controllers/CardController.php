<?php

namespace App\Http\Controllers;

use App\Card;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $key => $c){
            $cart[$key]['name'] = Product::find($c['id'])['name'];
            $val = intval(explode('R$',$c['total'])[1]);
            $total += $val;
        }
        return view('cart/index', compact('cart', 'total'));
    }
    public function shopping()
    {
        $cart = Session::get('cart');

        $total = 0;
        foreach ($cart as $key => $c){
            $cart[$key]['name'] = Product::find($c['id'])['name'];
            $val = intval(explode('R$',$c['total'])[1]);
            $total += $val;
        }
        return view('cart/index', compact('cart', 'total'));
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
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
