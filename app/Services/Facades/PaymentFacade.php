<?php
namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class PaymentFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return "PaymentService";
    }
}