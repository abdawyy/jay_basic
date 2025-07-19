<x-web.header />
<x-web.navbar />
<x-web.sidebar />




<section id="home" class="pt-4 pb-5">
    <div class="container">
        <div class="hero p-4">
            <div class="row fc-white align-content-end h-100 z-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12">
                        <h1 class="fw-bolder">{{ __('web.brand_collection_title') }}</h1>
                    </div>
                </div>
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-7">
                        <p>{{ __('web.brand_collection_desc') }}</p>
                    </div>
                    <div class="col-12 col-lg-5 text-lg-end text-start">
                        <a href="{{('/product/list/category') }}"
                           class="btn-custom px-5 py-2 fw-bolder">{{ __('web.discover') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="newCollection" class="py-lg-5 pb-5">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="fw-bolder">{{ __('web.new_collection') }}</h2>
            <p class="fc-gray fw-semibold">{{ __('web.new_collection_desc') }}</p>
        </div>

        <div id="newCollectionCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($products->chunk(4) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach($chunk as $product)
                                <div class="col-6 col-lg-3 pointer mb-3">
                                    <div class="card position-relative h-100">
                                        <a href="{{ url('product/show/' . $product->id) }}">
                                            @if ($product->productImages->isNotEmpty())
                                                <img src="{{ asset('storage/' . $product->productImages->first()->images) }}"
                                                    class="img-fluid" alt="{{ $product->title }}">
                                            @endif
                                            <div class="card-body pt-2">
                                                <h5 class="card-title text-truncate mb-0 fc-black">{{ $product->name }}</h5>
                                                <p class="card-text text-truncate my-lg-1 my-0 fc-gray">{{ $product->description }}</p>
                                                <p class="fc-black fw-bolder text-truncate fs-6 mb-0">
                                                    @if ($product->sale)
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
                                            <img src="{{ asset('assets/img/cart.svg') }}" alt="Add to cart" style="width: 24px;">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Carousel Controls --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#newCollectionCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newCollectionCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a href="{{ url( '/product/list/category') }}">
                <button class="btn-custom-dark px-5 py-2 d-flex align-items-center gap-2">
                    {{ __('web.show_all') }} <i class="fa-solid fa-arrow-right"></i>
                </button>
            </a>
        </div>
    </div>
</section>


<section id="category" class="pb-5">
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-4 col-md-6 pb-3">
                <div class="tops p-3">
                    <div class="row align-content-end h-100">
                        <h5 class="fw-bolder fc-white fs-1">{{ __('web.top') }}</h5>
                        <div class="d-flex">
                            <a href="product/list/category/1">
                                <button class="btn-custom px-5 py-2 fw-bolder">{{ __('web.see_details') }}</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-lg-4 col-md-6 pb-3">
                <div class="t-shirt p-3">
                    <div class="row align-content-end h-100">
                        <h5 class="fw-bolder fc-white fs-1">{{ __('web.Long Sleeve') }}</h5>
                        <div class="d-flex">
                            <a href="product/list/category/5">
                                <button class="btn-custom px-5 py-2 fw-bolder">{{ __('web.see_details') }}</button>
                            </a>
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
                <p class="mb-0">{!! __('web.footer_rights') !!}</p>
            </div>
            <div class="col-12 col-md-6 pt-md-0 pt-2">
                <div class="d-flex align-items-center gap-4 justify-content-md-end justify-content-center">
<!-- Social Media Icons -->
<a href="https://www.instagram.com/jaysbasicc/" target="_blank">
    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" width="30" height="30">
</a>

<a href="https://www.facebook.com/profile.php?id=61569107154988&mibextid=ZbWKwL" target="_blank">
    <img src="https://cdn-icons-png.flaticon.com/512/145/145802.png" alt="Facebook" width="30" height="30">
</a>

                    <a href="/contact" class="text-light">{{ __('web.cookies') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>


<x-web.footer />
