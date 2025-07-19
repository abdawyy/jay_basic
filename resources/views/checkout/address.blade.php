@php $locale = app()->getLocale(); @endphp


@section('title', __('checkout.title'))
@section('meta_description', __('checkout.description'))


<x-web.header />
<x-web.navbar />
<x-web.sidebar />

<section id="cart-page" class="pb-5">
    <div class="container pb-5">
        <div class="row pt-4">
            <!-- Shipping Address Section -->
            <div class="col-12 col-lg-7">
                <h1 class="fw-bolder fs-3">{{ __('checkout.shipping_address') }}</h1>
                <div class="row justify-content-start">
                    <div class="col-md-8 col-lg-10">
                        <form action="{{ route('checkout.order') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="full_name" class="form-label">{{ __('checkout.full_name') }}</label>
                                <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address_line_1" class="form-label">{{ __('checkout.address_line1') }}</label>
                                <input type="text" name="address_line1" id="address_line_1" class="form-control" value="{{ old('address_line1') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address_line_2" class="form-label">{{ __('checkout.address_line2') }}</label>
                                <input type="text" name="address_line2" id="address_line_2" class="form-control" value="{{ old('address_line2') }}">
                            </div>

                            <div class="mb-3">
                                <label for="city" class="form-label">{{ __('checkout.city') }}</label>
                                <select name="city" id="city" class="form-control" required>
                                    <option value="" disabled selected>{{ __('checkout.select_city') }}</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city') == $city->name ? 'selected' : '' }}>
                                            {{ $city->name . ' - ' . $city->price . ' LE ' . __('checkout.delivery_fees') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="state" class="form-label">{{ __('checkout.state') }}</label>
                                <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="postal_code" class="form-label">{{ __('checkout.postal_code') }}</label>
                                <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ old('postal_code') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">{{ __('checkout.country') }}</label>
                                <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">{{ __('checkout.phone_number') }}</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                            </div>

                            <!-- Promo Code -->
                            <div class="mb-3">
                                <label for="promo_code" class="form-label">{{ __('checkout.promo_code') }}</label>
                                <input type="text" name="promo_code" id="promo_code" class="form-control @error('promo_code') is-invalid @enderror"
                                    value="{{ old('promo_code') }}" placeholder="{{ __('checkout.enter_promo') }}" />

                                @if (session('success'))
                                    <div class="text-success">{{ session('success') }}</div>
                                @elseif (session('error'))
                                    <div class="text-danger">{{ session('error') }}</div>
                                @endif

                                @error('promo_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="col-12 col-lg-5 mb-4">
                <div style="position: sticky; top: 100px;">
                    <h5 class="fw-bolder fs-3">{{ __('checkout.summary') }}</h5>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fw-bolder fc-black pb-2">{{ __('checkout.your_order') }}</h5>
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <p class="mb-0">{{ __('checkout.subtotal') }}</p>
                                <p class="fw-bolder text-truncate fc-black mb-0">LE {{ $subtotal }}</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bolder text-truncate fc-black mb-0">{{ __('checkout.total') }}</h5>
                                <h5 class="fw-bolder text-truncate fc-black mb-0">LE {{ $total }}</h5>
                            </div>
                            <button class="solidBtn w-100 mt-3 py-2 gap-3">{{ __('checkout.confirm') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<x-web.footer />

