@extends('layouts.front')

@section('page-styles')

<link href="/assets/css/checkout.css" rel="stylesheet">

@stop

@section('page-content')

<main class="bg_gray">
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{ route('index') }}">Home</a></li>
					<li>Checkout</li>
				</ul>
			</div>
			<h1>Checkout</h1>
		</div>
		
		<form class="row" action="{{ route('checkout.charge') }}" method="POST">
			{{ csrf_field() }}
			
			<div class="col-lg-4 col-md-6">
				<div class="step first">
					<h3>1. User Info and Billing address</h3>
					<ul class="nav nav-tabs" id="tab_checkout" role="tablist">
						@guest
						
						<li class="nav-item">
							<!-- <a class="nav-link active" id="home-tab" data-toggle="tab" href="#register" role="tab" aria-controls="tab_1" aria-selected="true">Register</a> -->
							<span class="nav-link active">Register</span>
						</li>

						@else

						<li class="nav-item">
							<span class="nav-link active">Account</span>
						</li>

						@endguest
					</ul>

					<div class="tab-content checkout">

						@guest
						
						<div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="tab_1">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password">
							</div>
							<hr>
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
									<input type="text" class="form-control" placeholder="Name">
								</div>
								<div class="col-6 form-group pl-1">
									<input type="text" class="form-control" placeholder="Last Name">
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Full Address">
							</div>
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
									<input type="text" class="form-control" placeholder="City">
								</div>
								<div class="col-6 form-group pl-1">
									<input type="text" class="form-control" placeholder="Postal code">
								</div>
							</div>
							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-md-12 form-group">
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="country" id="country">
											<option value="" selected>Country</option>
											<option value="Europe">Europe</option>
											<option value="United states">United states</option>
											<option value="Asia">Asia</option>
										</select>
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Telephone">
							</div>
							<hr>
							<div class="form-group">
								<label class="container_check" id="other_addr">Other billing address
								<input type="checkbox">
								<span class="checkmark"></span>
								</label>
							</div>
							<div id="other_addr_c" class="pt-2">
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
									<input type="text" class="form-control" placeholder="Name">
								</div>
								<div class="col-6 form-group pl-1">
									<input type="text" class="form-control" placeholder="Last Name">
								</div>
							</div>
							<!-- /row -->
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Full Address">
							</div>
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
									<input type="text" class="form-control" placeholder="City">
								</div>
								<div class="col-6 form-group pl-1">
									<input type="text" class="form-control" placeholder="Postal code">
								</div>
							</div>
							<!-- /row -->
							<div class="row no-gutters">
								<div class="col-md-12 form-group">
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="country" id="country_2">
											<option value="" selected>Country</option>
											<option value="Europe">Europe</option>
											<option value="United states">United states</option>
											<option value="Asia">Asia</option>
										</select>
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Telephone">
							</div>
							</div>
							<!-- /other_addr_c -->
							<hr>
						</div>

						@else
						
						<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="tab_2">

								<div class="form-group">
									<input type="email" class="form-control" placeholder="Email">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password" name="password_in" id="password_in">
								</div>
								<div class="clearfix add_bottom_15">
									<div class="checkboxes float-left">
										<label class="container_check">Remember me
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<hr>
								<input type="submit" class="btn_1 full-width" value="Login">
						</div>

						@endguest
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="step middle payments">
					<h3>2. Payment and Shipping</h3>
					<ul>
						<li>
							<label class="container_radio">Credit Card
								<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
								<input type="radio" name="payment" checked>
								<span class="checkmark"></span>
							</label>
						</li>
						<li>
							<label class="container_radio">Paypal
								<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
								<input type="radio" name="payment">
								<span class="checkmark"></span>
							</label>
						</li>
						<li>
							<label class="container_radio">Cash on delivery
								<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
								<input type="radio" name="payment">
								<span class="checkmark"></span>
							</label>
						</li>
						<li>
							<label class="container_radio">Bank Transfer
								<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
								<input type="radio" name="payment">
								<span class="checkmark"></span>
							</label>
						</li>
					</ul>
					<div class="payment_info d-none d-sm-block">
						<figure><img src="/assets/img/cards_all.svg" alt=""></figure>
						<p>Sensibus reformidans interpretaris sit ne, nec errem nostrum et, te nec meliore philosophia. At vix quidam periculis. Solet tritani ad pri, no iisque definitiones sea.</p>
					</div>
					
					<h6 class="pb-2">Shipping Method</h6>
					<ul>
						<li>
							<label class="container_radio">Standard shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
								<input type="radio" name="shipping" checked>
								<span class="checkmark"></span>
							</label>
						</li>
						<li>
							<label class="container_radio">Express shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
								<input type="radio" name="shipping">
								<span class="checkmark"></span>
							</label>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="step last">
					<h3>3. Order Summary</h3>
                    <div class="box_general summary">
                        <ul>
                            @foreach(Cart::content() as $product)

                            <li class="clearfix"><em> {{ $product->qty }} x {{ $product->name }}</em>  <span>${{ $product->total() }}</span></li>

                            @endforeach
                        </ul>
                        <ul>
                            <li class="clearfix"><em><strong>Subtotal</strong></em>  <span>${{ Cart::total() }}</span></li>
                            <li class="clearfix"><em><strong>Shipping</strong></em> <span>$0</span></li>
                            
                        </ul>
                        <div class="total clearfix">TOTAL <span>${{ Cart::total() }}</span></div>
                        <div class="form-group">
                            <label class="container_check">Register to the Newsletter.
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        
                        <button type="button" class="btn_1 full-width">Confirm and Pay</button>
                    </div>
				</div>
			</div>
		</form>
	</div>
</main>

<div class="modal fade" id="payments_method" tabindex="-1" role="dialog" aria-labelledby="payments_method_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payments_method_title">Payments Methods</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, oratio possim ius cu. Labore prompta nominavi sea ei. Sea no animal saperet gloriatur, ius iusto ullamcorper ad. Qui ignota reformidans ei, vix in elit conceptam adipiscing, quaestio repudiandae delicatissimi vis ei. Fabulas accusamus no has.</p>
                <p>Et nam vidit zril, pri elaboraret suscipiantur ut. Duo mucius gloriatur at, in vis integre labitur dolores, mei omnis utinam labitur id. An eum prodesset appellantur. Ut alia nemore mei, at velit veniam vix, nonumy propriae conclusionemque ea cum.</p>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-scripts')

<script>
    // Other address Panel
    $('#other_addr input').on("change", function (){
        if(this.checked)
            $('#other_addr_c').fadeIn('fast');
        else
            $('#other_addr_c').fadeOut('fast');
    });
</script>

@stop