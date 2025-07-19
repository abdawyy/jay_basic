<x-admin.header />
<x-admin.aside />
<x-admin.navbar />

<main id="main">
    <div class="container">
        <div class="row pt-4">
            <div class="pagetitle">
                <h1>{{ __('city_list.title') }}</h1>
                <nav>
                    <ol class="breadcrumb d-flex {{ app()->getLocale() === 'ar' ? 'text-end' : 'text-start' }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('city_list.breadcrumb_main') }}</a>
                        </li>
                        <li class="mx-2">-</li>
                        <li class="breadcrumb-item active">
                            {{ __('city_list.breadcrumb_active') }}
                        </li>
                    </ol>
                </nav>
            </div>

            <x-data-table :headers="$headers" :rows="$rows" :url="$url" />

            <style>
                .btn-danger {
                    display: none;
                }
                svg{
                    width: 5px !important;
                                        height: 5px !important;

                }
            </style>

          <div>
  <div class="mt-4">
{{ $data->links('vendor.pagination.bootstrap-5') }}
            </div>
            <x-web.footer />
      
</main>
