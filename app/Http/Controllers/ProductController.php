<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $total = Cart::count();
        return view('product', compact('products', 'total'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $d = Cart::add($id, $product->name, 1, $product->price);
        return redirect()->route('product.index');
    }

    public function cart()
    {
        $cart = Cart::content();
        $total = (int)str_replace('.', '', Cart::subtotal());
        $total_taxt = $total + ($total / 10);
        return view('cart', compact('cart', 'total', 'total_taxt'));
    }

    public function removeProduct(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect()->back();
    }

    public function removeAll(Request $request)
    {
        Cart::destroy();
        return redirect()->back();
    }
}
