<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = app()->make(UserService::class);
    }

    public function update(Request $request)
    {

        $validated = $request->validate([
            'id'           => 'required|integer',
            'name'         => 'required|string',
            'email'        => 'required|email',
            'profile_img'  => 'image|mimes:jpg,png,jpeg,gif,svg|nullable',
            'old_password' => 'password|sometimes',
            'password'     => 'password|sometimes',
            'c_password'   => 'same:password|sometimes',
        ]);

        return response()->json(
            $this->userService->update($validated)
        );

    }

}
