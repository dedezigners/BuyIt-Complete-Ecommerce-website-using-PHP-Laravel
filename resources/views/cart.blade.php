@extends('layouts.front')

@section('page-styles')

<link href="/assets/css/cart.css" rel="stylesheet">

@stop

@section('page-content')

<main class="bg_gray">
    <form class="container margin_30" action="{{ route('cart.update') }}" method="POST">
        {{ csrf_field() }}
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Cart</li>
                </ul>
            </div>
            <h1>Cart</h1>
        </div>

        <table class="table table-striped cart-list">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach(Cart::content() as $product)
                    <input type="hidden" name="cart_id[]" value="{{ $product->rowId }}">
                    <tr>
                        <td>
                            <div class="thumb_cart">
                                <img 
                                src="/assets/img/products/product_placeholder_square_small.jpg" 
                                data-src="{{ $product->model->image }}" 
                                class="lazy" alt="Image">
                            </div>
                            <span class="item_cart">{{ $product->name }}</span>
                        </td>
                        <td><strong>${{ $product->price }}.00</strong></td>
                        <td>
                            <div class="numbers-row">
                                <input type="text" value="{{ $product->qty }}" class="qty2" name="quantity[]" readonly />
                                <div class="inc button_inc">+</div>
                                <div class="dec button_inc">-</div>
                            </div>
                        </td>
                        <td><strong>${{ $product->total() }}</strong></td>
                        <td class="options">
                            <a href="{{ route('cart.delete', ['id' => $product->rowId]) }}"><i class="ti-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row add_top_30 flex-sm-row-reverse cart_actions">
            <div class="col-sm-4 text-right">
                <button type="submit" class="btn_1 gray">Update Cart</button>
            </div>
            <div class="col-sm-8">
                <div class="apply-coupon">
                    <div class="form-group form-inline">
                        <input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"><button type="button" class="btn_1 outline">Apply Coupon</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <div class="box_cart">

        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <ul>
                        <li><span>Subtotal</span> ${{ Cart::total() }}</li>
                        <li><span>Shipping</span> $0.00</li>
                        <li><span>Total</span> ${{ Cart::total() }}</li>
                    </ul>
                    <a href="{{ route('checkout') }}" class="btn_1 full-width cart">Proceed to Checkout</a>
                </div>
            </div>
        </div>
        
    </div>
</main>

@stop

@section('page-scripts')



@stop