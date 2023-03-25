@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Logged in!</h1>
            <p class="lead">You are logged in with {{auth()->user()->email}} via {{auth()->user()->logged_in_with}}</p>
            <h5>Your {{auth()->user()->logged_in_with}} data:</h5>
            <p><b>Full Name:</b> {{auth()->user()->name}}<br>
                @if (auth()->user()->username)
                    <b>Username:</b> {{auth()->user()->username}}<br>
                @else
                    <b>Username:</b> none<br>
                @endif
                <b>Email:</b> {{auth()->user()->email}}<br>

                @if (auth()->user()->logged_in_with === "google")
                    <b>Given name:</b> {{auth()->user()->given_name}}<br>
                    <b>Family name:</b> {{auth()->user()->family_name}}<br>
                    <b>Locale:</b> {{auth()->user()->locale}}<br>
                    <b>Verified email:</b> {{auth()->user()->verified_email}}<br>

                    <b>Google ID:</b> {{auth()->user()->google_id}}<br>

                    <b>Avatar URL:</b> <a href="{{auth()->user()->avatar}}">{{auth()->user()->avatar}}</a><br>
                    <b>Avatar image:</b> <br><img src="{{auth()->user()->avatar}}" alt="Avatar" height="64" width="64">
                    <br>


                @elseif (auth()->user()->logged_in_with === "facebook")

                    <b>Facebook ID:</b> {{auth()->user()->facebook_id}}<br>
                    <b>Avatar URL:</b> <a
                        href="{{auth()->user()->avatar}}&access_token={{auth()->user()->remember_token}}">{{auth()->user()->avatar}}
                        ...</a><br>
                    <b>Avatar image:</b> <br><img
                        src="{{auth()->user()->avatar}}&access_token={{auth()->user()->remember_token}}" alt="Avatar"
                        height="64" width="64"><br>
        @endif
        @endauth

        @guest
            <h1>Homepage</h1>
            <p>Please login with a <b>google</b>, <b>facebook</b> or local account</p>
        @endguest
    </div>
@endsection
