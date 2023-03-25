<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FacebookLoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            Log::info(print_r($user, true));
            $finduser = User::where('facebook_id', $user->id)->first();


            $newUser = User::updateOrCreate(['email' => $user->email], [
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->nickname,
                'facebook_id' => $user->id,
                'avatar' => $user->avatar,
                'remember_token' => $user->token,
                'logged_in_with' => "facebook",
                'password' => Str::random(8),
            ]);

            Auth::login($newUser);

            return redirect()->intended('/');


        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
