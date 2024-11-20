<?php
namespace App\Services\Constractors;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface UserConstractor
{
    public function get() : AnonymousResourceCollection;

    public function show(User $user) : UserResource;

    public function store(UserRequest $request) : UserResource;

    public function update(UserRequest $request , User $user) : UserResource;

    public function destroy(User $user) : bool;
}