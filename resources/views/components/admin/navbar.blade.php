<nav id="navbar" class="navbar py-3 bg-white" style="position: sticky;  top: 0; z-index: 999;">
    <div class="container-fluid">
        <div class="d-flex align-items-center gap-2">
            <button class="navbar-toggler toggle-sidebar-btn" style="border: none;">
                <img src="/assets/img/humb-menu.svg" style="width: 24px;" alt="">
            </button>
            <a class="navbar-brand" href="/"><img src="/assets/img/logo.jpg" alt=""
                    style="width: 120px;"></a>
            <!-- <ul class="d-flex gap-3 px-3 me-auto mb-2 mb-lg-0" style="list-style: none;">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../index.html">Home</a>
                </li>
            </ul> -->

        </div>
        {{-- <div class="d-flex align-items-center gap-3" role="search">
            <a href="cart.html">
                <div class="position-relative">
                    <img src="../assets/img/cart.svg" style="width: 22px;" alt=""><span
                        class="position-absolute top-100 start-100 translate-middle badge-cart rounded-pill cart-Notify">+9
                        <span class="visually-hidden">unread messages</span></span>
                </div>
            </a>
            <a href="" data-bs-toggle="modal" data-bs-target="#seacrhBackdrop"><img src="../assets/img/search.svg"
                    style="width: 29px;" alt=""></a>
            <a href=""><img src="../assets/img/user.svg" style="width: 29px;" alt=""></a>
        </div> --}}
    </div>

</nav>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand" href="index.html"><img src="assets/img/logo.jpg" alt="" style="width: 120px;"></a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Shop
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="allProduct.html">All Products</a></li>
                    <li><a class="dropdown-item" href="allProduct.html">Tops</a></li>
                    <li><a class="dropdown-item" href="allProduct.html">T-Shirt</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
            </li>
        </ul>
    </div>
</div>
