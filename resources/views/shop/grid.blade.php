@extends('shop.main')

@section('page-content-shop')

<div class="row small-gutters">
    @foreach ($products as $product)

    <div class="col-6 col-md-4">
        <div class="grid_item">
            <!-- <span class="ribbon off">-30%</span> -->
            <figure>
                <a href="{{ route('product.single', ['product' => $product->slug]) }}">
                    <img 
                        class="img-fluid lazy"
                        src="assets/img/products/product_placeholder_square_medium.jpg"
                        data-src="{{ $product->image }}"
                        alt="{{ $product->name }}">
                </a>
                <!-- <div data-countdown="2020/03/7" class="countdown"></div> -->
            </figure>
            <a href="{{ route('product.single', ['product' => $product->slug]) }}">
                <h3>{{ $product->name }}</h3>
            </a>
            <div class="price_box">
                <span class="new_price">${{ $product->price }}.00</span>
                <!-- <span class="old_price">$60.00</span> -->
            </div>
            <ul>
                <li>
                    <a href="#!" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites">
                        <i class="ti-heart"></i>
                        <span>Add to favorites</span>
                    </a>
                </li>
                <li>
                    <a href="#!" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare">
                        <i class="ti-control-shuffle"></i>
                        <span>Add to compare</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cart.rapid', ['product' => $product->slug]) }}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart">
                        <i class="ti-shopping-cart"></i>
                        <span>Add to cart</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @endforeach
</div>

{{ $products->links('vendor.pagination.default') }}

@endsection