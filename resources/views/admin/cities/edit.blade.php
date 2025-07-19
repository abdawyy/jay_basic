<x-admin.header />
<x-admin.aside />

    <x-admin.navbar />

<main id="main">
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="pagetitle">
                <h1>Categories</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Categories</a></li>
                        <li class="breadcrumb-item active">list</li>
                    </ol>
                </nav>
            </div><!-- End Breadcrumbs with a page title -->

    <div class="card">
        <div class="card-body">
            <form id="prevent" action="{{ route('cities.edit',  $model->id ?? null) }}" method="POST">
                @csrf <!-- Include CSRF token for security -->
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Name</label>
                            <input type="text" name="name" placeholder="Enter cities Name" class="form-control" id="productName" value="{{ old('name', $model->name ?? '') }}" required> <!-- Fill with existing value -->
                            @error('name')
                                <div class="text-danger">{{ $message }}</div> <!-- Display validation error -->
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="mb-3">
                            <label for="citiesPrice" class="form-label">price</label>
                            <input type="text" price="price" name="price" placeholder="Enter  price" class="form-control" id="productprice" value="{{ old('price', $model->price ?? '') }}" required> <!-- Fill with existing value -->
                            @error('price')
                                <div class="text-danger">{{ $message }}</div> <!-- Display validation error -->
                            @enderror
                        </div>
                    </div>



                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-dark py-2 px-2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<x-web.footer />
