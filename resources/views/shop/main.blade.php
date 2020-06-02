@extends('layouts.front')

@section('page-styles')

<link href="/assets/css/listing.css" rel="stylesheet">

@stop

@section('page-content')

<main>
    <div class="top_banner">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
            <div class="container">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
                <h1>{{ $title }}</h1>
            </div>
        </div>
        <img src="/assets/img/bg_cat_shoes.jpg" class="img-fluid">
    </div>
    
    <div id="stick_here"></div>	
    <div class="toolbox elemento_stick">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <div class="sort_select">
                        <select name="sort" id="sort">
                            <option value="popularity" selected="selected">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to 
                        </select>
                    </div>
                </li>
                <li>
                    <a href="{{ route('shop') }}"><i class="ti-view-grid"></i></a>
                    <a href="{{ route('shop.list') }}"><i class="ti-view-list"></i></a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="container margin_30">
        
        <div class="row">
            <aside class="col-lg-3" id="sidebar_fixed">
                <form class="filter_col">
                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                    <div class="filter_type version_2">
                        <h4><a href="#filter_1" data-toggle="collapse" class="opened">Categories</a></h4>
                        <div class="collapse show" id="filter_1">
                            <ul>
                                <li>
                                    <label class="container_check">Men <small>12</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Women <small>24</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Running <small>23</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Training <small>11</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter_type version_2">
                        <h4><a href="#filter_2" data-toggle="collapse" class="opened">Color</a></h4>
                        <div class="collapse show" id="filter_2">
                            <ul>
                                <li>
                                    <label class="container_check">Blue <small>06</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Red <small>12</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Orange <small>17</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Black <small>43</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter_type version_2">
                        <h4><a href="#filter_3" data-toggle="collapse" class="closed">Brands</a></h4>
                        <div class="collapse" id="filter_3">
                            <ul>
                                <li>
                                    <label class="container_check">Adidas <small>11</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Nike <small>08</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Vans <small>05</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Puma <small>18</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter_type version_2">
                        <h4><a href="#filter_4" data-toggle="collapse" class="closed">Price</a></h4>
                        <div class="collapse" id="filter_4">
                            <ul>
                                <li>
                                    <label class="container_check">$0 — $50<small>11</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">$50 — $100<small>08</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">$100 — $150<small>05</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">$150 — $200<small>18</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="btn_1">Filter</button>
                        <button class="btn_1 gray">Reset</button>
                    </div>
                </form>
            </aside>
            <!-- /col -->
            <div class="col-lg-9">
                
                @yield('page-content-shop')
                
            </div>
        </div>
    </div>
</main>

@stop

@section('page-scripts')

<script src="/assets/js/sticky_sidebar.min.js"></script>
<script src="/assets/js/specific_listing.js"></script>

@stop