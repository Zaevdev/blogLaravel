<?php

namespace App\Http\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Throwable;

class AuthSocialService
{
    public function findAndUpdateOrCreate(object $userSocial): User
    {
        try {
            $user = User::updateOrCreate(
                [
                    'vk_id' => $userSocial->getId(),
                ],
                [
                    'email' => $userSocial->getEmail(),
                    'name' => $userSocial->getName(),
                    'password' => Hash::make(Str::random(10)),
                ],
            );
            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();

                $user->giveRolesTo('admin');
            }

            return $user;
        } catch (Throwable) {
            abort(500);
        }
    }
}