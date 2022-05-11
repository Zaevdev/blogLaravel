<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Service\AuthSocialService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    private AuthSocialService $authSocialService;

    public function __construct(AuthSocialService $authSocialService)
    {
        $this->authSocialService = $authSocialService;
    }

    public function index(): RedirectResponse
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback(): RedirectResponse
    {
        Auth::login(
            $this->
            authSocialService->
            findAndUpdateOrCreate(Socialite::driver('vkontakte')->user())
        );

        return redirect()->route('blog.index');
    }
}
