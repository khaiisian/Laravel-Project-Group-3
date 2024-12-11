<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href='public/blog.css'>
<link rel="stylesheet" href='public/blog.rtl.css'>
<title>Home Link</title>


<div class="container-fluid">
    <header class="border-bottom lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary" href="#">Subscribe</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 140px; height: auto;">
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                        viewBox="0 0 24 24">
                        <title>Search</title>
                        <circle cx="10.5" cy="10.5" r="7.5" />
                        <path d="M21 21l-5.2-5.2" />
                    </svg>
                </a>
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Log Out</button>
                </form>
                @endauth
                @guest
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Sign Up</a>
                @endguest
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-3 border-bottom">
        <nav class="nav nav-underline justify-content-between">
            <a class="nav-item nav-link link-body-emphasis" href="{{route('home')}}">Home</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{route('user.selection-type',['id' => 1])}}">To Sell</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{route('user.selection-type',['id' => 2])}}">To Rent</a>
            <a class="nav-item nav-link link-body-emphasis" href="view">View</a>
            @if(auth()->check())
            @if(auth()->user()->role === 'renter')
            <a class="nav-item nav-link link-body-emphasis" href="user_post">Posting</a>
            @elseif(auth()->user()->role === 'owner')
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('user_side.owner-post') }}">Posting</a>
            @endif
            @endif


            <a class="nav-item nav-link link-body-emphasis" href="contact">Contact</a>
            <a class="nav-item nav-link link-body-emphasis" href="feedback"><i class="fa-regular fa-comment icon_size mr-2"></i> Feedback</a>
            <a class="nav-item nav-link link-body-emphasis" href="profile"><i class="fa-regular fa-user mr-2"></i> Profile</a>
            <a class="nav-item nav-link link-body-emphasis" href="#"><i class="fa-solid fa-bell"></i></a>
            <a class="nav-item nav-link link-body-emphasis" href="#"
                @if(auth()->user() && auth()->user()->role == 'owner')
                style="display:block;"
                @else
                style="display:none;"
                @endif>
                <i class="fa-solid fa-bell"></i>
            </a>

        </nav>
    </div>
</div>

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }

    .fbcolor {
        color: #ff0000;
    }
</style>