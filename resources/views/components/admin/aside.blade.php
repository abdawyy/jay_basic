<!-- ======= Sidebar ======= -->
<aside id="sidebar"
       class="sidebar pt-5 {{ app()->getLocale() === 'ar' ? 'position-fixed end-0' : 'position-fixed start-0' }}"
       dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
       style="width: 280px; height: 100vh; background: #fff; overflow-y: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); z-index: 999;">

    <ul class="sidebar-nav {{ app()->getLocale() === 'ar' ? 'text-end pe-3' : 'text-start ps-3' }}" id="sidebar-nav">

        <!-- Language Switch -->
        <li class="nav-item">
            <div class="d-flex justify-content-center px-4 pt-3">
                <a class="text-decoration-none mx-2 {{ app()->getLocale() == 'en' ? 'fw-bold text-primary' : 'text-black' }}"
                   href="{{ url('/lang/en') }}">EN</a>
                |
                <a class="text-decoration-none mx-2 {{ app()->getLocale() == 'ar' ? 'fw-bold text-primary' : 'text-black' }}"
                   href="{{ url('/lang/ar') }}">العربية</a>
            </div>
        </li>

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid mx-2"></i>
                <span>{{ __('admin_sidebar.dashboard') }}</span>
            </a>
        </li>

        <!-- Products -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Products-nav" data-bs-toggle="collapse" href="#">
                <i class="bx bx-package mx-2"></i>
                <span>{{ __('admin_sidebar.products') }}</span>
                <i class="bi bi-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }} {{ app()->getLocale() === 'ar' ? 'me-auto' : 'ms-auto' }}"></i>
            </a>
            <ul id="Products-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('products.list') }}">{{ __('admin_sidebar.view_products') }}</a></li>
                <li><a href="{{ route('products.edit') }}">{{ __('admin_sidebar.add_product') }}</a></li>
            </ul>
        </li>

        <!-- Categories -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Categories-nav" data-bs-toggle="collapse" href="#">
                <i class="bx bx-category mx-2"></i>
                <span>{{ __('admin_sidebar.categories') }}</span>
                <i class="bi bi-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }} {{ app()->getLocale() === 'ar' ? 'me-auto' : 'ms-auto' }}"></i>
            </a>
            <ul id="Categories-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('categories.list') }}">{{ __('admin_sidebar.view_categories') }}</a></li>
                <li><a href="{{ route('categories.edit') }}">{{ __('admin_sidebar.add_category') }}</a></li>
            </ul>
        </li>

        <!-- Admins -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Admins-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-regular fa-chess-king mx-2"></i>
                <span>{{ __('admin_sidebar.admins') }}</span>
                <i class="bi bi-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }} {{ app()->getLocale() === 'ar' ? 'me-auto' : 'ms-auto' }}"></i>
            </a>
            <ul id="Admins-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('admin.list') }}">{{ __('admin_sidebar.view_admins') }}</a></li>
                <li><a href="{{ route('admin.register') }}">{{ __('admin_sidebar.add_admin') }}</a></li>
            </ul>
        </li>

        <!-- Cities -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cities-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-solid fa-city mx-2"></i>
                <span>{{ __('admin_sidebar.cities') }}</span>
                <i class="bi bi-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }} {{ app()->getLocale() === 'ar' ? 'me-auto' : 'ms-auto' }}"></i>
            </a>
            <ul id="cities-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('cities.list') }}">{{ __('admin_sidebar.view_cities') }}</a></li>
                <li><a href="{{ route('cities.edit') }}">{{ __('admin_sidebar.add_city') }}</a></li>
            </ul>
        </li>

        <!-- Types -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Types-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-solid fa-layer-group mx-2"></i>
                <span>{{ __('admin_sidebar.types') }}</span>
                <i class="bi bi-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }} {{ app()->getLocale() === 'ar' ? 'me-auto' : 'ms-auto' }}"></i>
            </a>
            <ul id="Types-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('type.list') }}">{{ __('admin_sidebar.view_types') }}</a></li>
                <li><a href="{{ route('type.edit') }}">{{ __('admin_sidebar.add_type') }}</a></li>
            </ul>
        </li>

        <!-- Discount Codes -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Discount-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-solid fa-tags mx-2"></i>
                <span>{{ __('admin_sidebar.discount_codes') }}</span>
                <i class="bi bi-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }} {{ app()->getLocale() === 'ar' ? 'me-auto' : 'ms-auto' }}"></i>
            </a>
            <ul id="Discount-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('discountCodes.list') }}">{{ __('admin_sidebar.view_discount_codes') }}</a></li>
                <li><a href="{{ route('discountCodes.edit') }}">{{ __('admin_sidebar.add_discount_code') }}</a></li>
            </ul>
        </li>

        <!-- Pages -->
        <li class="nav-heading">{{ __('admin_sidebar.pages') }}</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('order.list') }}">
                <i class="bx bx-file mx-2"></i>
                <span>{{ __('admin_sidebar.order_list') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('users.list') }}">
                <i class="bi bi-person mx-2"></i>
                <span>{{ __('admin_sidebar.user_list') }}</span>
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 mt-3">
                    {{ __('admin_sidebar.logout') }}
                </button>
            </form>
        </li>
    </ul>
</aside>


