<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class GoogleLoginController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        try {

            $user = Socialite::driver('google')->user();
            Log::info(print_r($user, true));
            $finduser = User::where('google_id', $user->id)->first();


            $newUser = User::updateOrCreate(['email' => $user->email], [
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->nickname,
                'google_id' => $user->id,
                'avatar' => $user->avatar,
                'given_name' => $user->user['given_name'],
                'family_name' => $user->user['family_name'],
                'locale' => $user->user['locale'],
                'verified_email' => $user->user['verified_email'],
                'remember_token' => $user->token,
                'logged_in_with' => "google",
                'password' => Str::random(8),
            ]);

            Auth::login($newUser);

            if ($finduser){
                return redirect()->intended('/');
            }else{
                return redirect()->intended('/color');
            }


        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
