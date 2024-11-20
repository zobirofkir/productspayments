<?php
namespace App\Services\Services;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Constractors\UserConstractor;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserService implements UserConstractor
{
    public function get() : AnonymousResourceCollection
    {
        return UserResource::collection(
            User::paginate(10)
        );
    }

    public function show(User $user) : UserResource
    {
        return UserResource::make($user);
    }

    public function store(UserRequest $request) : UserResource
    {
        return UserResource::make(
            User::create(
                $request->validated()
            )
        );
    }

    public function update(UserRequest $request, User $user) : UserResource
    {
        $user->update($request->validated());
        return UserResource::make(
            $user->refresh()
        );
    }

    public function destroy(User $user) : bool
    {
        return $user->delete();
    }
}