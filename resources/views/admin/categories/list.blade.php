<x-admin.header />
<x-admin.aside />
<x-admin.navbar />
@php
    $locale = app()->getLocale(); // Get the current locale, e.g., 'ar' or 'en'
    $isRtl = $locale === 'ar';
@endphp
<main id="main">
    <div class="container">
        <div class="row pt-4">
            <div class="pagetitle">
                <h1>{{ __('category_list.title') }}</h1>
                <nav>
                    <ol class="breadcrumb d-flex {{ $isRtl ? 'text-end' : 'text-start' }}"
                        dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('category_list.breadcrumb_main') }}</a>
                        </li>
                        <li class="mx-2">-</li>
                        <li class="breadcrumb-item active">
                            {{ __('category_list.breadcrumb_active') }}
                        </li>
                    </ol>

                </nav>
            </div>

            <x-data-table :headers="$headers" :rows="$rows" :url="$url" />

            <style>
                .btn-danger {
                    display: none;
                }
                    svg {
        width: 5px !important;
        height: 5px !important;

    }
            </style>

            <div class="mt-4">
{{ $data->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</main>

<x-web.footer />