@php
    $locale = app()->getLocale();
@endphp


@section('title', __('cart.title'))
@section('meta_description', __('cart.description'))


<x-web.header />
<x-web.navbar />
<x-web.sidebar />

<section id="cart-page" class="pb-5">
    <div class="container pb-5">
        <div class="row pt-4">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                @endif
            </div>

            <div class="col-12 col-lg-7">
                @if ($cartItems->count() > 0)
                    <h1 class="fw-bolder fs-3">
                        {{ __('cart.your_cart') }}
                        <span class="fc-gray fw-normal fs-4">
                            ({{ $cartItems->count() }} {{ __('cart.items') }})
                        </span>
                    </h1>
                @else
                    <h1 class="fw-bolder fs-3">{{ __('cart.empty') }}</h1>
                @endif

                @foreach ($cartItems as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex gap-3 align-items-start">
                                @if ($item->product->productImages->isNotEmpty())
                                    <img src="{{ asset('storage/' . $item->product->productImages->first()->images) }}" alt="">
                                @endif
                                <div class="w-100">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title text-truncate mb-0 fc-black">{{ $item->product->name }}</h5>
                                        <h5 class="fw-bolder text-truncate fc-black mb-0">LE
                                            {{ $item->quantity * ($item->product->price - ($item->product->price * $item->product->sale / 100)) }}
                                        </h5>
                                    </div>
                                    <div class="d-flex flex-column pt-2">
                                        <p class="text-truncate mb-0 fc-gray">{{ __('cart.color') }} : {{ $item->product->color }}</p>
                                        <p class="text-truncate mb-0 fc-gray">{{ __('cart.size') }} : {{ $item->productItems->size }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="quantity fw-bolder fs-5">{{ $item->quantity }}</div>
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <a href="{{ route('cart.delete', ['id' => $item->id]) }}">
                                                <i class="fa-regular fa-trash-can pointer fs-4" title="{{ __('cart.delete') }}"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($total > 0)
                <div class="col-12 col-lg-5 mb-4">
                    <div style="position: sticky; top: 100px;">
                        <h5 class="fw-bolder fs-3">{{ __('cart.summary') }}</h5>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="fw-bolder fc-black pb-2">{{ __('cart.your_order') }}</h5>
                                <div class="d-flex justify-content-between align-items-center pb-3">
                                    <p class="mb-0">{{ __('cart.subtotal') }}</p>
                                    <p class="fw-bolder text-truncate fc-black mb-0">LE {{ $subtotal }}</p>
                                </div>

                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bolder text-truncate fc-black mb-0">{{ __('cart.total') }}</h5>
                                    <h5 class="fw-bolder text-truncate fc-black mb-0">LE {{ $total }}</h5>
                                </div>

                                <a href="{{ route('checkout.index') }}" class="solidBtn w-100 mt-3 py-2 gap-3">
                                    {{ __('cart.checkout') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<x-web.footer />


