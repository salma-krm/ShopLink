<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function checkout()
    {
     $panier = session()->get('cart', []);
    return view('checkout', compact('panier')); 
    }
 
    public function session(Request $request)
{
    // Set the Stripe API key
    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    $productname = $request->get('productname');
    $totalprice = $request->get('total');
    $two0 = "00";
    $total = "$totalprice$two0";

    // Create the Stripe Checkout Session
    $session = \Stripe\Checkout\Session::create([
        'line_items'  => [
            [
                'price_data' => [
                    'currency'     => 'USD',
                    'product_data' => [
                        'name' => $productname,
                    ],
                    'unit_amount'  => $total,
                ],
                'quantity'   => 1,
            ],
        ],
        'mode'        => 'payment',
        'success_url' => route('success'),
        'cancel_url'  => route('checkout'),
    ]);
    return redirect()->away($session->url);
}

 
    public function success()
    {
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }

}
