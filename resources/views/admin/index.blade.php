<x-admin.header />
<x-admin.aside />
<x-admin.navbar />
@php
    $locale = app()->getLocale(); // Get the current locale, e.g., 'ar' or 'en'
    $isRtl = $locale === 'ar';
@endphp
<main id="main">
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="pagetitle">
                <h1>{{ __('dashboard.dashboard') }}</h1>
                <nav>
                    <ol class="breadcrumb d-flex {{ $isRtl ? 'text-end' : 'text-start' }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}"">
                        <li class="breadcrumb-item">
                            <a href="/admin/dashboard">{{ __('dashboard.home') }}</a></li>
                                <li class="mx-2">-</li>

                        <li class="breadcrumb-item active">{{ __('dashboard.dashboard') }}</li>
                    </ol>
                </nav>
            </div>

            <div class="col-6 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="mb-0 fw-semibold">{{ __('dashboard.total_revenue') }}</p>
                            <i class='bx bx-dollar fs-5'></i>
                        </div>
                        <p class="mb-0 fs-2 fw-bold">{{ $totalAmount }} {{ __('dashboard.currency') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="mb-0 fw-semibold">{{ __('dashboard.num_orders') }}</p>
                            <i class='bx bx-credit-card fs-5'></i>
                        </div>
                        <p class="mb-0 fs-2 fw-bold">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="mb-0 fw-semibold">{{ __('dashboard.users') }}</p>
                            <i class="bi bi-people fs-5 d-flex"></i>
                        </div>
                        <p class="mb-0 fs-2 fw-bold">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<x-web.footer />
