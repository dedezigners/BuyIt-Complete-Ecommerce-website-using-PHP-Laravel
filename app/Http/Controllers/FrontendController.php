<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Welcome to eCommerce shopping store by DeDezigners',
        ]);
    }

    public function shop()
    {
        return view('shop.grid', [
            'title' => 'Shop',
            'products' => Product::paginate(12)
        ]);
    }
    
    public function shopList()
    {
        return view('shop.list', [
            'title' => 'Shop List',
            'products' => Product::paginate(12)
        ]);
    }

    public function singleProduct($product)
    {
        $product = Product::where('slug', '=', $product)->first();

        if ($product) {
            # code...
            return view('single-product', [
                'title' => $product->name,
                'product' => $product
            ]);
        } else {
            abort(404);
        }
    }
}
