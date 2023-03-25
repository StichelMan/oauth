@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('colorPost') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <label for="exampleColorInput" class="form-label">Choose your favorite color</label>
                <input name="fav_color" type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
                <input type="hidden" name="email" value="{{auth()->user()->email}}" />
                <input type="submit" value="Submit">
            </form>

        @endauth

        @guest
            <h1>Homepage</h1>
            <p>Please login with a <b>google</b>, <b>facebook</b> or local account</p>
        @endguest
    </div>
@endsection
