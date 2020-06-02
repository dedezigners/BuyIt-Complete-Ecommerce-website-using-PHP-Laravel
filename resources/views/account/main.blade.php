@extends('layouts.front')

@section('page-styles')

<link href="/assets/css/account.css" rel="stylesheet">

@endsection

@section('page-content')

<main class="bg_gray">
	<div class="container margin_30">
		
        <div class="page_header">

            @yield('page-account-breadcrumbs')

        </div>

		
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="list-group-item"><a href="{{ route('profile') }}">Address</a></li>
                    <li class="list-group-item"><a href="{{ route('wishlist') }}">Wishlist</a></li>
                    <li class="list-group-item"><a href="{{ route('orders') }}">Orders</a></li>
                    <li class="list-group-item"><a href="{{ route('order.track') }}">Track Order</a></li>
                </ul>
            </div>

            <div class="col-lg-9 col-md-8">

                @yield('page-account-content')
                
            </div>
        </div>

    </div>
</main>

@endsection
