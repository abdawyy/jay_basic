<x-web.header />
<x-web.navbar />
<x-web.sidebar />

<style>
svg{
    display: none;
}



</style>
<section class="pb-5">
    <div class="container py-5">
        <div class="row">
            <!-- Filter Sidebar (desktop) -->
            <aside class="col-lg-3 d-none d-lg-block">
                <div class="card card-aside position-sticky" style="top: 130px;">
                    <div class="card-body">
                        <h5 class="d-flex justify-content-between align-items-center">
                            {{ __('web.filter') }}
                            <i class="fa-solid fa-filter"></i>
                        </h5>
                        <nav class="nav flex-column nav-pills">
                            @foreach ($categories as $category)
                                <a href="{{ url( '/product/list/category/' . $category->id) }}"
                                   class="nav-link">
                                   {{ $category->name }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </aside>

            <!-- Product Listing -->
            <main class="col-lg-9 col-12" id="allProduct">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <h1 class="fs-1 mb-0">
                        {{ $id ? $categoryName->name : __('web.all_products') }}
                    </h1>

                    <!-- Mobile Filter Dropdown -->
                    <div class="dropdown d-lg-none">
                        <button class="dropdownBtn dropdown-toggle px-3" type="button" data-bs-toggle="dropdown">
                            {{ __('web.filter') }}
                        </button>
                        <ul class="dropdown-menu p-2 w-100">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ url('/product/list/category/' . $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Products -->
                <div class="row">
                    @foreach ($data as $product)
                        <article class="col-6 col-lg-4 pointer mb-4">
                            <div class="card h-100 shadow-sm border-0">
                                <a href="{{ route('product.show', [$product->id]) }}" class="text-decoration-none">
                                    <img src="{{ $product->productImages->isNotEmpty() 
                                        ? 'https://jaysbasic.site/' . Storage::url($product->productImages->first()->images) 
                                        : asset('assets/img/default-product.jpg') }}"
                                         class="card-img-top img-fluid"
                                         alt="{{ $product->name }}">

                                    <div class="card-body">
                                        <h2 class="h6 fc-black fw-bold text-truncate">{{ $product->name }}</h2>
                                        <p class="text-muted text-truncate small">{{ $product->description }}</p>
                                        <div class="fw-bold text-black">
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
                                        </div>
                                    </div>
                                </a>
                                <div class="cart">
                                    <img src="{{ asset('assets/img/cart.svg') }}" alt="Add to cart" width="24">
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-end mt-4">
{{ $data->links('vendor.pagination.bootstrap-5') }}
                </div>
            </main>
        </div>
    </div>
</section>

<x-web.footer />
