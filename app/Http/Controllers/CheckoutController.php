<?php

namespace App\Http\Controllers;

use Cart;
use Session;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $stripeApiKey = 'sk_test_tAIEd0s6d0UNM854JNW2XUey00Xbo2ne8T';

    public function index()
    {
        if (Cart::content()->count() <= 0) {
            Session::flash('info', 'Your cart is empty, nothing to buy do some shopping first.');
            return redirect()->route('shop');
        }

        $totalPayment = str_replace('.', '', Cart::total());

        Stripe::setApiKey($this->stripeApiKey);

        $intent = PaymentIntent::create([
            'amount' => $totalPayment,
            'currency' => 'usd',
            // Verify your integration in this guide by including this parameter
            'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);

        return view('checkout', [
            'title' => 'Checkout',
            'client_secret' => $intent->client_secret,
        ]);
    }


    public function stripe_charge(Request $request)
    {
        dd($request->all());
    }
}
