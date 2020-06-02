<?php 
$title = 'Login'; ?>
@extends('layouts.front')

@section('page-styles')

<link href="/assets/css/account.css" rel="stylesheet">

@stop

@section('page-content')

<main class="bg_gray">
	<div class="container margin_30">

		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{ route('index') }}">Home</a></li>
					<li>Sign In</li>
				</ul>
            </div>
            <h1>Sign In</h1>
	    </div>


        <div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8 mr-auto ml-auto">
				<div class="box_account">
					<h3 class="client">Already Client</h3>

					<form class="form_container" action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email*" value="{{ old('email') }}" />
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password" placeholder="Password*" />
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="clearfix add_bottom_15">
							<div class="checkboxes float-left">
								<label class="container_check">Remember me
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<span class="checkmark"></span>
								</label>
							</div>
							<!-- <div class="float-right"><a id="forgot" href="javascript:void(0);">Lost Password?</a></div> -->
						</div>

						<button type="submit" class="btn_1 full-width">{{ __('Sign In') }}</button>
					</form>

				</div>
			</div>
		</div>

    </div>
</main>

@stop

@section('page-scripts')

@stop