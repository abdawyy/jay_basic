<header id="header" class="bg-black">
    <p class="text-center fc-white py-2 mb-0">Jay's.</p>
</header>

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Other meta tags -->
</head>

<nav class="navbar navbar-expand-lg py-3 bg-white" style="position: sticky;  top: 0; z-index: 999;">
    <div class="container">
        <div class="d-flex align-items-center gap-2">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample" style="border: none;">
                <img src={{ asset('assets/img/humb-menu.svg') }} style="width: 24px;" alt="">
            </button>
            <a class="navbar-brand" href="/"><img src={{ asset('assets/img/logo.jpg') }} alt=""
                    style="width: 120px;"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('product.List') }}">all products</a></li>
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('product.List', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Type
                        </a>
                        <!-- Dropdown for Types -->
                        <ul class="dropdown-menu">
                            @foreach ($types as $type)
                                <li><a class="dropdown-item"
                                        href="/show-type/{{ $type->id }}">{{ $type->name }}</a></li>
                            @endforeach
                        </ul>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3" role="search">
            <a href="{{ route("cart.index") }}">
                <div class="position-relative">
                    <img src={{ asset('assets/img/cart.svg') }} style="width: 22px;" alt=""><span
                        class="position-absolute top-100 start-100 translate-middle badge-cart rounded-pill cart-Notify">
                        {{ $cartCount > 9 ? '+9' : $cartCount }}
                    </span>

                </div>
            </a>
            <a id="openPopupBtn" onclick="openSearchPopup()" ><img
                    src={{ asset('assets/img/search.svg') }} style="width: 29px;" alt=""></a>
            <a href="/user/profile"><img src={{ asset('assets/img/user.svg') }} style="width: 29px;" alt=""></a>
        </div>
    </div>

</nav>
<!-- Popup container -->
<div id="searchPopup" class="popup d-none">
    <div class="popup-content">
        <span class="close-btn" onclick="closeSearchPopup()">&times;</span>
        <h3>Search</h3>

        <!-- Laravel Form -->
        <form method="POST" action="{{ route("product.List") }}" id="searchForm">
            @csrf <!-- Laravel CSRF token for security -->
            <input type="text" id="searchInput" name="search" placeholder="Enter search term..." required>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</div>
<style>
    /* Popup container (hidden by default) */

.popup {
    position: fixed; /* Stay in place */
    z-index: 999; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
    display: flex; /* Use flex to center content */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
}

/* Popup content */
.popup-content {
    background-color: white;
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* 80% of the viewport width on smaller screens */
    max-width: 500px; /* Limit max width */
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}

/* Close button */
.close-btn {
    color: #aaa;
    float: right;
    font-size: 24px;
    font-weight: bold;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
    cursor: pointer;
}

/* Responsive Design */
@media (max-width: 600px) {
    .popup-content {
        width: 90%; /* Expand to 90% width on smaller screens */
        padding: 15px;
    }

    .close-btn {
        font-size: 20px;
    }
}

</style>
<script> // Function to open the popup
// Function to open the popup
function openSearchPopup() {
    document.getElementById('searchPopup').classList.remove('d-none');
}

// Function to close the popup
function closeSearchPopup() {
    document.getElementById('searchPopup').classList.add('d-none');
}



     </script>
