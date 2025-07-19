<x-web.header />
<x-web.navbar />
<x-web.sidebar />




<section id="home" class="pt-4 pb-5">
    <div class="container ">
        <div class="hero p-4">
            <div class="row fc-white align-content-end h-100 z-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12">
                        <h1 class="fw-bolder">JAY'S BRAND COLLECTION</h1>
                    </div>
                </div>
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-7">

                        <p>Discover our latest collection, featuring unique styles that celebrate the vibrant culture
                            and fashion of Egypt</p>
                    </div>
                    <div class="col-12 col-lg-5 text-lg-end text-start">
                        <a href="/product/list/category" class="btn-custom px-5 py-2 fw-bolder">Discover</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="newCollection" class="py-lg-5 pb-5">
    <div class="container">
        <div class="section-title">
            <div class="text-center">
                <h2 class="fw-bolder">NEW COLLECTION</h2>
                <p class="fc-gray fw-semibold">Elevate your style with our new collection, crafted by Jay.</p>
            </div>
            <div class="row py-3">
                @foreach ($products as $product)
                    <div class="col-6 col-lg-3 pointer mb-3">
                        <div class="card position-relative">
                            <a href="{{ url('product/show/' . $product->id) }}"> <!-- Link to product detail page -->
                                @if ($product->productImages->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->productImages->first()->images) }}"
                                        class="img-fluid" alt="{{ $product->title }}">
                                @endif

                                <div class="card-body pt-2">
                                    <h5 class="card-title text-truncate mb-0 fc-black">{{ $product->name }}</h5>
                                    <!-- Product title -->
                                    <p class="card-text text-truncate my-lg-1 my-0 fc-gray">{{ $product->description }}
                                    </p> <!-- Product description -->

                                    <!-- Product price -->
                                    <p class="fc-black fw-bolder text-truncate fs-6 mb-0">
                                        @if ($product->sale) <!-- Check if sale is active -->
                                            <span class="text-decoration-line-through text-muted me-2">
                                                {{ number_format($product->price, 2) }} LE
                                            </span>
                                            <span class="text-danger">
                                                {{ number_format($product->price - ($product->price * $product->sale / 100), 2) }} LE
                                            </span>
                                        @else
                                            {{ number_format($product->price, 2) }} LE
                                        @endif
                                    </p>

                                </div>
                            </a>
                            <div class="cart">
                                <img src="{{ asset('assets/img/cart.svg') }}"
                                    style="width: 24px; object-fit: scale-down;" alt="Add to cart">
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-6 col-lg-3 pointer mb-3">

                    <div class="card position-relative">
                        <a href="oneProduct.html">
                            <img src="assets/img/p-white-t-shirt-2.jpeg" class="img-fluid" alt="...">
                            <div class="card-body pt-2">
                                <h5 class="fc-black card-title text-truncate mb-0">Card title</h5>
                                <p class="card-text text-truncate my-lg-1 my-0 fc-gray">Some quick example text to
                                    build
                                    on the
                                    card title and make up the bulk of the card's content.</p>
                                <h5 class="fc-black fw-bolder text-truncate">$20</h5>
                            </div>
                        </a>
                        <div class="cart">
                            <img src="assets/img/cart.svg" style="width: 24px; object-fit: scale-down;" alt="">
                        </div>
                    </div>


                </div>
                <div class="col-6 col-lg-3 pointer mb-3">

                    <div class="card position-relative">
                        <a href="oneProduct.html">
                            <img src="assets/img/p-pink-top.jpeg" class="img-fluid" alt="...">
                            <div class="card-body pt-2">
                                <h5 class="fc-black card-title text-truncate mb-0">Card title</h5>
                                <p class="card-text text-truncate my-lg-1 my-0 fc-gray">Some quick example text to
                                    build
                                    on the
                                    card title and make up the bulk of the card's content.</p>
                                <h5 class="fc-black fw-bolder text-truncate">$20</h5>
                            </div>
                        </a>
                        <div class="cart">
                            <img src="assets/img/cart.svg" style="width: 24px; object-fit: scale-down;" alt="">
                        </div>
                    </div>


                </div>
                <div class="col-6 col-lg-3 pointer mb-3">

                    <div class="card position-relative">
                        <a href="oneProduct.html">
                            <img src="assets/img/p-white-top.jpeg" class="img-fluid" alt="...">
                            <div class="card-body pt-2">
                                <h5 class="fc-black card-title text-truncate mb-0">Card title</h5>
                                <p class="card-text text-truncate my-lg-1 my-0 fc-gray">Some quick example text to
                                    build
                                    on the
                                    card title and make up the bulk of the card's content.</p>
                                <h5 class="fc-black fw-bolder text-truncate">$20</h5>
                            </div>
                        </a>
                        <div class="cart">
                            <img src="assets/img/cart.svg" style="width: 24px; object-fit: scale-down;" alt="">
                        </div>
                    </div>

                </div> --}}
            </div>
            <div class="d-flex justify-content-center">
                <a href="/product/list/category"><button
                        class="btn-custom-dark px-5 py-2 d-flex align-items-center gap-2">Show All <i
                            class="fa-solid fa-arrow-right"></i></button></a>
            </div>
        </div>
    </div>
</section>

<section id="category" class="pb-5">
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-4 col-md-6 pb-3">
                <div class="tops p-3">
                    <div class="row align-content-end h-100">
                        <h5 class="fw-bolder fc-white fs-1">Top</h5>
                        <div class="d-flex">
                            <a href="{{ route('product.List') }}"><button class="btn-custom px-5 py-2 fw-bolder">See
                                    Details</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-lg-4 col-md-6 pb-3">
                <div class="t-shirt p-3">
                    <div class="row align-content-end h-100">
                        <h5 class="fw-bolder fc-white fs-1">T-Shirt</h5>
                        <div class="d-flex">
                            <a href="{{ route('product.List') }}"><button class="btn-custom px-5 py-2 fw-bolder">See
                                    Details</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<footer class="bg-black text-light">
    <div class="container py-3">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-md-6 text-center text-md-start">
                <p class="mb-0">&copy; 2024 Jays's Production</p>
            </div>
            <div class="col-12 col-md-6 pt-md-0 pt-2">
                <div class="d-flex align-items-center gap-4 justify-content-md-end justify-content-center">
                    <a href="" class="text-light">Terms</a>
                    <a href="" class="text-light">Privacy Policy</a>
                    <a href="" class="text-light">Cookie Policy</a>
                </div>

            </div>
        </div>
    </div>
</footer>






{{-- <!-- Modal -->
<div class="modal fade" id="seacrhBackdrop" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="seacrhBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="max-height: 70vh;">
            <div class="modal-header">
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="basic-addon1"><img src="assets/img/search.svg" alt=""></span>
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center">
                    <h3 class="fc-gray">No Product Match</h3>
                </div>
                <a href="oneProduct.html" class="pointer">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-2"><img src="assets/img/p-pink-top.jpeg" alt=""></div>
                                <div class="col-10">
                                    <div class="w-100">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title text-truncate mb-0 fc-black">Card title</h5>
                                            <h5 class="fw-bolder text-truncate fc-black mb-0">$20</h5>
                                        </div>
                                        <div class="row pt-2 w-100">
                                            <p class="mb-0 fc-gray text-truncate">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit. Aspernatur sed, id tenetur incidunt
                                                reiciendis veritatis sequi voluptatibus odio mollitia quis molestias
                                                reprehenderit similique minima, ullam rerum saepe consequatur
                                                blanditiis! Repellat!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="oneProduct.html" class="pointer">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-2"><img src="assets/img/p-pink-top.jpeg" alt=""></div>
                                <div class="col-10">
                                    <div class="w-100">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title text-truncate mb-0 fc-black">Card title</h5>
                                            <h5 class="fw-bolder text-truncate fc-black mb-0">$20</h5>
                                        </div>
                                        <div class="row pt-2 w-100">
                                            <p class="mb-0 fc-gray text-truncate">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit. Aspernatur sed, id tenetur incidunt
                                                reiciendis veritatis sequi voluptatibus odio mollitia quis molestias
                                                reprehenderit similique minima, ullam rerum saepe consequatur
                                                blanditiis! Repellat!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="oneProduct.html" class="pointer">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-2"><img src="assets/img/p-pink-top.jpeg" alt=""></div>
                                <div class="col-10">
                                    <div class="w-100">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title text-truncate mb-0 fc-black">Card title</h5>
                                            <h5 class="fw-bolder text-truncate fc-black mb-0">$20</h5>
                                        </div>
                                        <div class="row pt-2 w-100">
                                            <p class="mb-0 fc-gray text-truncate">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit. Aspernatur sed, id tenetur incidunt
                                                reiciendis veritatis sequi voluptatibus odio mollitia quis molestias
                                                reprehenderit similique minima, ullam rerum saepe consequatur
                                                blanditiis! Repellat!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="oneProduct.html" class="pointer">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-2"><img src="assets/img/p-pink-top.jpeg" alt=""></div>
                                <div class="col-10">
                                    <div class="w-100">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title text-truncate mb-0 fc-black">Card title</h5>
                                            <h5 class="fw-bolder text-truncate fc-black mb-0">$20</h5>
                                        </div>
                                        <div class="row pt-2 w-100">
                                            <p class="mb-0 fc-gray text-truncate">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit. Aspernatur sed, id tenetur incidunt
                                                reiciendis veritatis sequi voluptatibus odio mollitia quis molestias
                                                reprehenderit similique minima, ullam rerum saepe consequatur
                                                blanditiis! Repellat!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="oneProduct.html" class="pointer">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-2"><img src="assets/img/p-pink-top.jpeg" alt=""></div>
                                <div class="col-10">
                                    <div class="w-100">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title text-truncate mb-0 fc-black">Card title</h5>
                                            <h5 class="fw-bolder text-truncate fc-black mb-0">$20</h5>
                                        </div>
                                        <div class="row pt-2 w-100">
                                            <p class="mb-0 fc-gray text-truncate">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit. Aspernatur sed, id tenetur incidunt
                                                reiciendis veritatis sequi voluptatibus odio mollitia quis molestias
                                                reprehenderit similique minima, ullam rerum saepe consequatur
                                                blanditiis! Repellat!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="oneProduct.html" class="pointer">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-2"><img src="assets/img/p-pink-top.jpeg" alt=""></div>
                                <div class="col-10">
                                    <div class="w-100">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title text-truncate mb-0 fc-black">Card title</h5>
                                            <h5 class="fw-bolder text-truncate fc-black mb-0">$20</h5>
                                        </div>
                                        <div class="row pt-2 w-100">
                                            <p class="mb-0 fc-gray text-truncate">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit. Aspernatur sed, id tenetur incidunt
                                                reiciendis veritatis sequi voluptatibus odio mollitia quis molestias
                                                reprehenderit similique minima, ullam rerum saepe consequatur
                                                blanditiis! Repellat!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="oneProduct.html" class="pointer">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-2"><img src="assets/img/p-pink-top.jpeg" alt=""></div>
                                <div class="col-10">
                                    <div class="w-100">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title text-truncate mb-0 fc-black">Card title</h5>
                                            <h5 class="fw-bolder text-truncate fc-black mb-0">$20</h5>
                                        </div>
                                        <div class="row pt-2 w-100">
                                            <p class="mb-0 fc-gray text-truncate">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit. Aspernatur sed, id tenetur incidunt
                                                reiciendis veritatis sequi voluptatibus odio mollitia quis molestias
                                                reprehenderit similique minima, ullam rerum saepe consequatur
                                                blanditiis! Repellat!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="oneProduct.html" class="pointer">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-2"><img src="assets/img/p-pink-top.jpeg" alt=""></div>
                                <div class="col-10">
                                    <div class="w-100">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title text-truncate mb-0 fc-black">Card title</h5>
                                            <h5 class="fw-bolder text-truncate fc-black mb-0">$20</h5>
                                        </div>
                                        <div class="row pt-2 w-100">
                                            <p class="mb-0 fc-gray text-truncate">Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit. Aspernatur sed, id tenetur incidunt
                                                reiciendis veritatis sequi voluptatibus odio mollitia quis molestias
                                                reprehenderit similique minima, ullam rerum saepe consequatur
                                                blanditiis! Repellat!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div> --}}
<x-web.footer />
