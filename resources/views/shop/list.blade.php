@extends('shop.main')

@section('page-content-shop')

<div class="row small-gutters">
    @foreach ($products as $product)

    <div class="row row_item">
        <div class="col-sm-4">
            <figure>
                <span class="ribbon off">-30%</span>
                <a href="{{ route('product.single', ['product' => $product->slug]) }}">
                    <img class="img-fluid lazy" src="/assets/img/products/product_placeholder_square_medium.jpg" data-src="{{ $product->image }}" alt="{{ $product->name }}">
                </a>
                <!-- <div data-countdown="2020/03/15" class="countdown"></div> -->
            </figure>
        </div>
        <div class="col-sm-8">
            <div class="rating">
                <i class="icon-star voted"></i>
                <i class="icon-star voted"></i>
                <i class="icon-star voted"></i>
                <i class="icon-star voted"></i>
                <i class="icon-star"></i>
            </div>
            <a href="{{ route('product.single', ['product' => $product->slug]) }}">
                <h3>{{ $product->name }}</h3>
            </a>
            <p>{{ $product->truncate($product->description) }}</p>
            <div class="price_box">
                <span class="new_price">${{ $product->price }}.00</span>
                <!-- <span class="old_price">$60.00</span> -->
            </div>
            <ul>
                <li><a href="#0" class="btn_1">Add to Cart</a></li>
                <li><a href="#0" class="btn_1 gray tooltip-1" data-toggle="tooltip" data-placement="top" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                <li><a href="#0" class="btn_1 gray tooltip-1" data-toggle="tooltip" data-placement="top" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
            </ul>
        </div>
    </div>

    @endforeach
</div>

{{ $products->links('vendor.pagination.default') }}

@endsection