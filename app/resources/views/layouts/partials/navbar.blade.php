<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"/>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="." class="nav-link px-2 text-secondary">Home</a></li>
            </ul>

            @auth
                @if (auth()->user()->username)
                    <span class="px-2">{{auth()->user()->username}}</span>
                @else
                    <span class="px-2">{{auth()->user()->name}}</span>
                @endif

                <div class="text-end px-2">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
                @if (auth()->user()->logged_in_with === "google")
                    <img class="rounded-circle" src="{{auth()->user()->avatar}}" alt="Avatar" height="64" width="64">
                @elseif (auth()->user()->logged_in_with === "facebook")
                    <img class="rounded-circle"
                         src="{{auth()->user()->avatar}}&access_token={{auth()->user()->remember_token}}" alt="Avatar"
                         height="64" width="64">
                @endif
            @endauth

            @guest
                <div class="text-end">
                    <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register.perform') }}" class="btn btn-warning">Register</a>
                </div>
            @endguest
        </div>
    </div>
</header>
