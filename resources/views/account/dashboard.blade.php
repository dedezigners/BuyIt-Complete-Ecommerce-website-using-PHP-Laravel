@extends('account.main')

@section('page-account-breadcrumbs')

<div class="breadcrumbs">
    <ul>
        <li><a href="{{ route('index') }}">Home</a></li>
        <li><a href="{{ route('account') }}">Account</a></li>
        <li>Dashboard</li>
    </ul>
</div>
<h1>Dashbaord</h1>

@endsection

@section('page-account-content')

<div class="card">
    <div class="card-title">Dashboard</div>

    <div class="card-body">

        <div class="row">
            
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">TOTAL <br/> ORDERS</div>
                    <div class="card-body">
                        <h1>{{ rand(8, 80) }}</h1>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">TOTAL <br/> Wishlist</div>
                    <div class="card-body">
                        <h1>{{ rand(8, 80) }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">TOTAL <br/> ORDERS</div>
                    <div class="card-body">
                        <h1>{{ rand(8, 80) }}</h1>
                    </div>
                </div>
            </div>

        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    </div>
</div>

@endsection