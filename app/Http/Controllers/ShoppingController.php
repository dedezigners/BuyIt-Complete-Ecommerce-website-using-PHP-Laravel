<?php

namespace App\Http\Controllers;

use Cart;
use Session;
use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart(Request $request)
    {
        if ($request->quantity <= 0) 
        {
            Session::flash('error', 'Product quantity should be greater then or equal to one');
            return redirect()->back();
        }

        $product = Product::find($request->product_id);

        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->price
        ]);

        Cart::associate($cart->rowId, 'App\Product');

        Session::flash('success', 'Product successfully added in cart');
        return redirect()->route('cart');
    }



    public function rapid_add_to_cart($productSlug)
    {
        $product = Product::where('slug', '=', $productSlug)->first();

        if ($product) {

            $cart = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price
            ]);
    
            Cart::associate($cart->rowId, 'App\Product');

            Session::flash('success', 'Product added to cart, Continue shopping or view cart page.');
        } else {
            Session::flash('error', 'No product found, the product you want to buy is not avialable.');
        }

        return redirect()->back();
    }



    public function update_cart(Request $request)
    {
        foreach($request->cart_id as $key => $value)
        {
            Cart::update($value, $request->quantity[$key]);
        }
        
        Session::flash('success', 'Shopping cart updated successfull');
        return redirect()->back();
    }



    public function cart()
    {
        if (Cart::content()->count() <= 0) {
            Session::flash('info', 'Your cart is empty, do some shopping first.');
            return redirect()->route('shop');
        }

        return view('cart', [
            'title' => 'Cart',
        ]);
    }



    public function cart_item_delete($id)
    {
        Cart::remove($id);

        Session::flash('success', 'Product removed from cart');
        return redirect()->back();
    }
}
