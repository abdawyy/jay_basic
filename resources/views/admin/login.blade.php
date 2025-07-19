<x-admin.header />
<x-admin.navbar />

<div class="d-flex justify-content-center align-items-center vh-100">
    
    <form action="{{ route('admin.login') }}" method="POST" class="p-4 shadow-sm bg-white rounded w-25">
          <!-- Language Switcher -->
<div class="d-flex justify-content-center px-4 pt-3">
    <a class="text-decoration-none mx-2 {{ app()->getLocale() == 'en' ? 'fw-bold text-primary' : 'text-black' }}" href="{{ url('/lang/en') }}">EN</a>
    |
    <a class="text-decoration-none mx-2 {{ app()->getLocale() == 'ar' ? 'fw-bold text-primary' : 'text-black' }}" href="{{ url('/lang/ar') }}">العربية</a>
</div>
        @csrf
        <h3 class="text-center mb-4">{{ __('admin.login_title') }}</h3>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('admin.email') }}</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('admin.password') }}</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark w-100">{{ __('admin.login_button') }}</button>
    </form>
</div>

<x-web.footer />
