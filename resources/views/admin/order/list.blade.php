<x-admin.header />
<x-admin.aside />
<x-admin.navbar />

<main id="main">
    <div class="container">
        <div class="row pt-4">
            @php
                $isRtl = app()->getLocale() === 'ar';
            @endphp

            <div class="pagetitle">
                <h1>{{ __('orders.title') }}</h1>
                <nav>
                    <ol class="breadcrumb d-flex {{ $isRtl ? 'text-end' : 'text-start' }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('orders.breadcrumb_main') }}</a>
                        </li>
                        <li class="mx-2">-</li>
                        <li class="breadcrumb-item active">
                            {{ __('orders.breadcrumb_active') }}
                        </li>
                    </ol>
                </nav>
            </div><!-- End Breadcrumbs with a page title -->

            <x-data-table :headers="$headers" :rows="$rows" :url="$url"/>

            <!-- Pagination links -->
            <div class="mt-4">
{{ $data->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</main>

<style>
    .btn-danger {
        display: none;
    }

    svg {
        width: 5px !important;
        height: 5px !important;
    }
</style>

<x-admin.footer />
