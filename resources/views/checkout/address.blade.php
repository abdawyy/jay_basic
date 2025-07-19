<x-web.header />
<x-web.navbar />
<x-web.sidebar />


<section id="cart-page" class="pb-5">
    <div class="container pb-5">
        <div class="row pt-4">
            <!-- Shipping Address Section -->
            <div class="col-12 col-lg-7">
                <h1 class="fw-bolder fs-3">Shipping Address</h1>
                <div class="row justify-content-start">
                    <div class="col-md-8 col-lg-10">
                        <form action="{{ route('checkout.order') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" name="full_name" id="full_name" class="form-control"
                                    value="{{ old('full_name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address_line_1" class="form-label">Address Line 1</label>
                                <input type="text" name="address_line1" id="address_line_1" class="form-control"
                                    value="{{ old('address_line1') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address_line_2" class="form-label">Address Line 2 (Optional)</label>
                                <input type="text" name="address_line2" id="address_line_2" class="form-control"
                                    value="{{ old('address_line2') }}">
                            </div>

                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <select name="city" id="city" class="form-control" required>
                                    <option value="" disabled selected>Select a city</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city') == $city->name ? 'selected' : '' }}  >
                                            {{ $city->name   .  '  ' .  $city->price . ' LE delvery fees   '  }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" name="state" id="state" class="form-control"
                                    value="{{ old('state') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <input type="text" name="postal_code" id="postal_code" class="form-control"
                                    value="{{ old('postal_code') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" name="country" id="country" class="form-control"
                                    value="{{ old('country') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control"
                                    value="{{ old('phone_number') }}" required>
                            </div>

                            <!-- Promo Code Field -->
                            <div class="mb-3">
                                <label for="promo_code" class="form-label">Promo Code (Optional)</label>
                                <input type="text" name="promo_code" id="promo_code"
                                    class="form-control @error('promo_code') is-invalid @enderror"
                                    value="{{ old('promo_code') }}" placeholder="Enter promo code" />

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
                    <h5 class="fw-bolder fs-3">Summary</h5>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fw-bolder fc-black pb-2">Your Order</h5>
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <p class="mb-0">Subtotal</p>
                                <p class="fw-bolder text-truncate fc-black mb-0">LE {{ $subtotal }}</p>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-between align-items-center ">
                                <h5 class="fw-bolder text-truncate fc-black mb-0">Total</h5>
                                <h5 class="fw-bolder text-truncate fc-black mb-0">LE {{ $total }}</h5>
                            </div>
                            <button class="solidBtn w-100 mt-3 py-2 gap-3">Confirm</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<x-web.footer />
