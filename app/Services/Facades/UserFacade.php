<?php
namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return "UserService";
    }
}