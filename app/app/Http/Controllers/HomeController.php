<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Services\Login\RememberMeExpiration;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function color()
    {
        return view('home.color');
    }

    public function colorPost(Request $request)
    {


        User::updateOrCreate(['email' => $request->email], [
            'fav_color' => $request->fav_color
        ]);

        return redirect('/');
    }
}
