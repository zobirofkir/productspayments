<?php
namespace App\Services\Constractors;

interface PaymentConstructor
{
    public function createPaymentIntent(float $amount, string $currency, array $metadata): array;
}