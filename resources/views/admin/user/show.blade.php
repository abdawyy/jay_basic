@php $isRtl = app()->getLocale() === 'ar'; @endphp

<x-admin.header />
<x-admin.aside />
<x-admin.navbar />

<main id="main">
    <div class="container">
        <div class="row pt-4">
            <div class="pagetitle">
                <h1>{{ __('users.show_title') }}</h1>
                <nav>
                    <ol class="breadcrumb d-flex {{ $isRtl ? 'text-end' : 'text-start' }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
                        <li class="breadcrumb-item">
                            <a href="/">{{ __('users.breadcrumb_main') }}</a>
                        </li>
                        <li class="mx-2">-</li>
                        <li class="breadcrumb-item active">
                            {{ __('users.breadcrumb_active') }}
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="container">
                <h2>{{ __('users.addresses') }}</h2>
                <div class="card mb-2">
                    <div class="card-body p-2">
                        @if ($user && $user->address->isNotEmpty())
                            @foreach ($user->address as $address)
                                <div class="address-section mb-1">
                                    <p class="mb-0"><strong>{{ __('users.address_line1') }}:</strong> {{ $address->address_line1 ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>{{ __('users.address_line2') }}:</strong> {{ $address->address_line2 ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>{{ __('users.city') }}:</strong> {{ $address->city ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>{{ __('users.state') }}:</strong> {{ $address->state ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>{{ __('users.postal_code') }}:</strong> {{ $address->postal_code ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>{{ __('users.mobile') }}:</strong> {{ $address->phone_number ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>{{ __('users.country') }}:</strong> {{ $address->country ?? 'N/A' }}</p>
                                    <hr class="my-1">
                                </div>
                            @endforeach
                        @else
                            <p><strong>{{ __('users.address') }}:</strong> {{ __('users.not_available') }}</p>
                        @endif
                    </div>
                </div>

                <h2>{{ __('users.orders') }}</h2>
                <div class="mb-3">
                    <input type="text" id="orderSearch" class="form-control" placeholder="{{ __('users.search_orders') }}" onkeyup="filterOrders()">
                </div>

                <div class="card mb-3">
                    <div class="card-body p-2">
                        @if ($user && $user->order->isNotEmpty())
                            <ul id="orderList" class="list-group list-group-flush">
                                @foreach ($user->order as $order)
                                    <li class="list-group-item order-item">
                                        <a href="{{ url('admin/order/edit/' . $order->id) }}">
                                            <strong>{{ __('users.order') }} #{{ $order->id }}</strong>
                                        </a>
                                        <div class="order-details">
                                            <span><strong>{{ __('users.total') }}:</strong> ${{ $order->total_amount ?? 'N/A' }}</span>,
                                            <span><strong>{{ __('users.status') }}:</strong> {{ $order->status ?? __('users.pending') }}</span>,
                                            <span><strong>{{ __('users.discount') }}:</strong> {{ $order->discountCode->code ?? 'N/A' }}</span>,
                                            <span><strong>{{ __('users.city') }}:</strong> {{ $order->city->name ?? 'N/A' }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p><strong>{{ __('users.orders') }}:</strong> {{ __('users.no_orders') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<x-web.footer />

<script>
    function filterOrders() {
        const searchInput = document.getElementById('orderSearch');
        const filter = searchInput.value.toLowerCase();
        const orders = document.querySelectorAll('.order-item');

        orders.forEach(order => {
            const orderDetails = order.textContent || order.innerText;
            order.style.display = orderDetails.toLowerCase().includes(filter) ? '' : 'none';
        });
    }
</script>
