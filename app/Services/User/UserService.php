<?php

namespace App\Services\User;

use App\Repositories\UserRepository;
use App\Services\User\UserInterface;

class UserService implements UserInterface
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = app()->make(UserRepository::class);
    }

    public function update($data)
    {
        $image     = data_get($data, 'profile_img');
        $imageName = '';
        if ($image) {
            $imageName = $this->saveImage($image);
        }

        $user              = $this->userRepository->initialize();
        $user->name        = data_get($data, 'name');
        $user->email       = data_get($data, 'email');
        $user->profile_img = $imageName;

        $this->userRepository->store($user);

        return $user;
    }

    private function saveImage($image)
    {
        try {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);

        } catch (\Throwable $th) {
            throw $th;
        }

        return $imageName;
    }

}
