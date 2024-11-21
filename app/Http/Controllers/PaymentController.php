<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Product;
use App\Services\Facades\PaymentFacade;

class PaymentController extends Controller
{
    public function createPayment(PaymentRequest $request)
    {
        $validated = $request->validated();

        $product = Product::find($validated['product_id']);

        $metadata = [
            'product_id' => $product->id,
            'product_title' => $product->title,
            'user_id' => $product->user_id,
        ];

        $response = PaymentFacade::createPaymentIntent(
            $validated['amount'],
            $validated['currency'],
            $metadata
        );

        return response()->json($response);
    }
}
