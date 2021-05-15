<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart_items = Cart::content();
        return response(Cart::total());
        return view('frontend.carts.index', compact('cart_items'));
    }
}
