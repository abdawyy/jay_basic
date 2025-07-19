
@section('title', __('confirmation.title'))
@section('meta_description', __('confirmation.description'))


<x-web.header />
<x-web.navbar />
<x-web.sidebar />

<div id="home" class="hero d-flex justify-content-center align-items-center">
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Confirmation Card -->
    <div class="card card-content bg-transparent text-center p-4">
        <h2>{{ __('confirmation.heading') }}</h2>
        <p>{{ __('confirmation.thank_you') }}</p>
        <p>{{ __('confirmation.order_id') }} <strong>#{{ $orderID }}</strong></p>
        <p>{{ __('confirmation.delivery_fees') }} <strong>{{ $deleveryFees }} LE</strong></p>
        <p>{{ __('confirmation.total_price') }} <strong>{{ $totalPrice }} LE</strong></p>
        <a href="/" class="btn btn-primary mt-3">{{ __('confirmation.back_home') }}</a>
    </div>
</div>

<style>
    .hero {
        position: relative;
        background-image: url('{{ asset('assets/img/p-white-t-shirt-2-hero.jpeg') }}');
        background-size: cover;
        background-position: center;
        width: 100%;
        border-radius: 10px;
        aspect-ratio: 6/3;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.386);
        border-radius: 10px;
        transition: background-color 0.3s ease;
        z-index: 1;
    }

    .hero:hover .overlay {
        background-color: rgba(0, 0, 0, 0.23);
    }

    .card-content {
        position: relative;
        z-index: 2;
        color: white;
    }
</style>

<x-web.footer />
