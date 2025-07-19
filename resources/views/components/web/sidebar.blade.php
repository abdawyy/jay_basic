<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Jay Logo" style="width: 160px; height: 80px">
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            {{-- Home --}}
            <li class="nav-item">
                <a class="nav-link" href="/">
                    {{ __('web.home') }}
                </a>
            </li>

            {{-- Category --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    {{ __('web.category') }}
                </a>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                        <li>
                            <a class="dropdown-item"
                               href="{{ url( '/product/list/category/' . $category->id) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            {{-- Uncomment and Translate These If Needed --}}
            {{--
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    {{ __('web.type') }}
                </a>
                <ul class="dropdown-menu">
                    @foreach($types as $type)
                        <li>
                            <a class="dropdown-item"
                               href="{{ url('/lang/' . app()->getLocale() . '/show-type/' . $type->id) }}">
                                {{ $type->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">{{ __('web.contact_us') }}</a>
            </li>
            --}}
        </ul>
    </div>
</div>
