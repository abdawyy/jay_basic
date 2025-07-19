<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- Charset & Viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ __('web.description') }}">
    <meta name="keywords" content="{{ __('web.keywords') }}">
    <meta name="author" content="Jay Basic">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="{{ __('web.title') }}">
    <meta property="og:description" content="{{ __('web.description') }}">
    <meta property="og:image" content="{{ asset('assets/img/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('web.title') }}">
    <meta name="twitter:description" content="{{ __('web.description') }}">
    <meta name="twitter:image" content="{{ asset('assets/img/logo.png') }}">

    <!-- hreflang for SEO -->
    <link rel="alternate" hreflang="en" href="{{ url('/lang/en') }}">
    <link rel="alternate" hreflang="ar" href="{{ url('/lang/ar') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Title -->
    <title>{{ __('web.title') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=El+Messiri:wght@400;700&display=swap">
</head>

<body>

    <header id="header" class="bg-black">
        <p class="text-center fc-white py-2 mb-0">{{ __('web.title') }}.</p>
    </header>

    {{-- Navigation --}}
    <nav class="navbar navbar-expand-lg py-3 bg-white" style="position: sticky; top: 0; z-index: 999;">
        <div class="container ">
            <div class="d-flex justify-content-center  gap-2  gap-mobile-12em">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="border: none;">
                    <img src="{{ asset('assets/img/humb-menu.svg') }}" style="width: 24px;" alt="">
                </button>
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Jay Logo" style="width: 120px; height: 80px">
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">{{ __('web.home') }}</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                {{ __('web.category') }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('product.List') }}">{{ __('web.all_products') }}</a></li>
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item"
                                            href="{{ route('product.List', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Right Side Icons --}}
            <div class="d-flex align-items-center gap-md-4 gap-mobile-4_4em">
                <a href="{{ route('cart.index') }}">
                    <div class="position-relative">
                        <img src="{{ asset('assets/img/cart.svg') }}" style="width: 22px;" alt="">
                        <span
                            class="position-absolute top-100 start-100 translate-middle badge-cart rounded-pill cart-Notify">
                            {{ $cartCount > 9 ? '+9' : $cartCount }}
                        </span>
                    </div>
                </a>

                <a onclick="openSearchPopup()" id="openPopupBtn">
                    <img src="{{ asset('assets/img/search.svg') }}" style="width: 29px;" alt="">
                </a>

                <a href="/user/profile">
                    <img src="{{ asset('assets/img/user.svg') }}" style="width: 29px;" alt="">
                </a>

                {{-- Language Switcher --}}
                <div>
                    <a class="text-decoration-none me-2 {{ app()->getLocale() == 'en' ? 'fw-bold text-primary' : 'text-black' }}"
                        href="{{ url('/lang/en') }}">EN</a>
                    |
                    <a class="text-decoration-none ms-2 {{ app()->getLocale() == 'ar' ? 'fw-bold text-primary' : 'text-black' }}"
                        href="{{ url('/lang/ar') }}">العربية</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Search Popup --}}
    <div id="searchPopup" class="popup d-none">
        <div class="popup-content">
            <span class="close-btn" onclick="closeSearchPopup()">&times;</span>
            <h3>{{ __('web.search') }}</h3>

            <form method="POST" action="{{ route('product.List') }}">
                @csrf
                <input type="text" id="searchInput" name="search" placeholder="{{ __('web.search_placeholder') }}"
                    required>
                <button class="btn btn-primary" type="submit">{{ __('web.search') }}</button>
            </form>
        </div>
    </div>

    {{-- Popup Styles --}}
    <style>
        .popup {
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .close-btn {
            color: #aaa;
            font-size: 24px;
            float: right;
            font-weight: bold;
            cursor: pointer;
        }

        .close-btn:hover {
            color: black;
        }

        @media (max-width: 600px) {
            .popup-content {
                width: 90%;
                padding: 15px;
            }

            .close-btn {
                font-size: 20px;
            }
        }
    </style>

    {{-- Popup Script --}}
    <script>
        function openSearchPopup() {
            document.getElementById('searchPopup').classList.remove('d-none');
        }
        function closeSearchPopup() {
            document.getElementById('searchPopup').classList.add('d-none');
        }
    </script>

</body>

</html>
<style>
    @media (max-width: 767.98px) {
        .gap-mobile-12em {
            gap: 12.5em !important;
        }
        .navbar-brand{
            margin: 10px !important;
        }

        .gap-mobile-4_4em {
            gap: 3.8em !important;
        }
  
    }

    @media (min-width: 768px) {
        .gap-desktop-2 {
            gap: 0.5rem !important; /* Bootstrap gap-2 = 0.5rem */
        }

        .gap-desktop-3 {
            gap: 1rem !important; /* Bootstrap gap-3 = 1rem */
        }
    }
</style>
