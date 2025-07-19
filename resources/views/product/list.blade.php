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
            <!-- Sidebar for Filters (Only visible on large screens) -->
            <div class="col-lg-3 col-8 position-relative d-none d-lg-block">
                <aside class="position-sticky" style="top: 100px;">
                    <div class="card card-aside">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Filter</h5>
                                        <i class="fa-solid fa-filter"></i>
                                    </div>
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <!-- Example dynamic categories (T-shirt, Tops) -->
                                        @foreach ($categories as $category)
                                            <a class="text-start nav-link {{ $loop->first ? '' : '' }}"
                                                data-bs-target="#v-pills-{{ $category->id }}" role="tab"
                                                href="/product/list/category/{{ $category->id }}"
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <!-- Main product listing -->
            <main class="col-lg-9 col-12" id="allProduct">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    @if(!$id)
                    <h1 class="fs-1 mb-0 pb-0">ALL PRODUCTS</h1>
                    @else
                    <h1 class="fs-1 mb-0 pb-0">{{ $categoryName->name}}</h1>
                    @endif

                    <!-- Mobile filter dropdown -->
                    <div class="dropdown d-lg-none d-block">
                        <button class="dropdownBtn dropdown-toggle px-3" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Filter
                        </button>
                        <div class="dropdown-menu" style="width: 200px;">
                            <div class="row p-2">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5>Filter</h5>
                                                <i class="fa-solid fa-filter"></i>
                                            </div>
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                                aria-orientation="vertical">
                                                @foreach ($categories as $category)
                                                    <a class="text-start nav-link {{ $loop->first ? '' : '' }}"
                                                        data-bs-target="#v-pills-{{ $category->id }}" type="button"
                                                        role="tab" href="/product/list/category/{{ $category->id }}"
                                                        aria-controls="v-pills-{{ $category->id }}"
                                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                        {{ $category->name }}
                                                    </a>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab content for product listing based on categories -->
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach ($categories as $category)
                        <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                            id="v-pills-{{ $category->id }}" role="tabpanel"
                            aria-labelledby="v-pills-{{ $category->id }}-tab" tabindex="0">
                            <div class="row">
                                @foreach ($data as $product)
                                    <div class="col-6 col-lg-4 pointer mb-3">
                                        <div class="card position-relative">
                                            <a href="{{ route('product.show', $product->id) }}">
                                               <img src="{{ $product->productImages->isNotEmpty() 
    ? 'https://jaysbasic.site' . Storage::url($product->productImages->first()->images) 
    : asset('assets/img/default-product.jpg') }}" 
    class="img-fluid" 
    alt="{{ $product->name }}">


                                                <div class="card-body pt-2">
                                                    <h5 class="fc-black card-title text-truncate mb-0">
                                                        {{ $product->name }}
                                                    </h5>
                                                    <p class="card-text text-truncate my-lg-1 my-0 fc-gray">
                                                        {{ $product->description }}
                                                    </p>
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
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-end">
                    <nav aria-label="Page navigation example">
                        <div class="d-flex align-items-center gap-2">
                           
                            <div class="page-number d-flex align-items-center gap-1">
                                <!-- Example pagination links -->
                                {{ $data->links() }}
                            </div>
                         
                        </div>
                    </nav>
                </div>
            </main>
        </div>
    </div>
</section>
<x-web.footer />
