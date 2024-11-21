<?php
namespace App\Services\Services;

use App\Services\Constractors\PaymentConstructor;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentService implements PaymentConstructor
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function createPaymentIntent(float $amount, string $currency, array $metadata): array
    {

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => [
                        'name' => $metadata['product_title'],
                    ],
                    'unit_amount' => $amount * 100, 
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => env('SUCCESS_URL') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => env('CANCEL_URL'),
            'metadata' => $metadata,
        ]);

        return [
            'status' => 'success',
            'url' => $session->url, 
        ];
    }
}
