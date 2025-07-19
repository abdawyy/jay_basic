<x-admin.header />
<x-admin.aside />

<x-admin.navbar />

<main id="main">
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="pagetitle">
                <h1>Discount Codes</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Discount Codes</a></li>
                        <li class="breadcrumb-item active">list</li>
                    </ol>
                </nav>
            </div><!-- End Breadcrumbs with Page Title -->

            <div class="card">
                <div class="card-body">
                    <form id="prevent" action="{{ route('discountCodes.edit', $model->id ?? null) }}" method="POST">
                        @csrf
                       

                        <div class="row">
                            <!-- Code Input -->
                            <div class="col-lg-12 col-12">
                                <div class="mb-3">
                                    <label for="code" class="form-label">Discount Code</label>
                                    <input type="text" name="code" placeholder="e.g., SPRING2024" class="form-control" id="code" value="{{ old('code', $model->code ?? '') }}" required>
                                    @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Discount Percentage Input -->
                            <div class="col-lg-12 col-12">
                                <div class="mb-3">
                                    <label for="discount_percentage" class="form-label">Discount Percentage (%)</label>
                                    <input type="number" name="discount_percentage" min="1" max="100" placeholder="Enter a percentage (e.g., 20)" class="form-control" id="discount_percentage" value="{{ old('discount_percentage', $model->discount_percentage ?? '') }}" required>
                                    @error('discount_percentage')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Expiry Date Input -->
                            <div class="col-lg-12 col-12">
                                <div class="mb-3">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <input type="date" name="expiry_date" class="form-control" id="expiry_date" value="{{ old('expiry_date', $model->expiry_date ?? '') }}" required>
                                    @error('expiry_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-dark py-2 px-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<x-web.footer />
