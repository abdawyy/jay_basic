<x-admin.header />
<x-admin.aside />

<x-admin.navbar />

@php $isRtl = app()->getLocale() === 'ar'; @endphp

<main id="main">
    <div class="container">
        <div class="row pt-4">
            <div class="pagetitle">
                <h1>{{ __('products.title') }}</h1>
                <nav>
                    <ol class="breadcrumb d-flex {{ $isRtl ? 'text-end' : 'text-start' }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
                        <li class="breadcrumb-item"><a href="#">{{ __('products.breadcrumb_main') }}</a></li>
                        <li class="mx-2">-</li>
                        <li class="breadcrumb-item active">{{ __('products.breadcrumb_list') }}</li>
                    </ol>
                </nav>
            </div>

            <x-data-table :headers="$headers" :rows="$rows" :url="$url"/>

            <!-- Pagination links -->
            <div class="mt-4">
{{ $data->links('vendor.pagination.bootstrap-5') }}
            </div>

            <style>
                .btn-danger {
                    display: none;
                }

                svg {
                    width: 5px !important;
                    height: 5px !important;
                }
            </style>
        </div>
    </div>
</main>

<x-admin.footer />
