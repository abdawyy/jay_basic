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
                <h1>{{ __('admin_list.title') }}</h1>

                <ol class="breadcrumb d-flex {{ $isRtl ? 'text-end' : 'text-start' }}"
                    dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
                    <li class="breadcrumb-item">
                        <a href="#">{{ __('admin_list.breadcrumb_main') }}</a>
                    </li>

                    <li class="mx-2">-</li>

                    <li class="breadcrumb-item active">
                        {{ __('admin_list.breadcrumb_active') }}
                    </li>
                </ol>
            </div><!-- End Breadcrumbs with a page title -->

            <x-data-table :headers="$headers" :rows="$rows" :url="$url" />

            <!-- Pagination links -->
            <div class="mt-4">
{{ $admins->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</main>
<style>
    svg {
        width: 5px !important;
        height: 5px !important;

    }
      .btn-primary {
                    display: none;
                }
</style>

<x-web.footer />