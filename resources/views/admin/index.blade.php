<x-admin.header />
<x-admin.aside />

    <x-admin.navbar />

    <main id="main">
        <div class="container-fluid">
            <div class="row pt-4">
                <div class="pagetitle">
                    <h1>Dashboard</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                </div><!-- End Breadcrumbs with a page title -->
                <div class="col-6 col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <p class="mb-0 fw-semibold">Total Revenue</p>
                                <i class='bx bx-dollar fs-5'></i>
                            </div>
                            <p class="mb-0 fs-2 fw-bold">{{ $totalAmount }} LE </p>
                            {{-- <p class="mb-0 fc-gray fw-semibold" style="font-size: 14px;">+20.1% from last month</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <p class="mb-0 fw-semibold"> num of Orders</p>
                                <i class='bx bx-credit-card fs-5'></i>
                            </div>
                            <p class="mb-0 fs-2 fw-bold">{{ $totalOrders }}</p>
                            {{-- <p class="mb-0 fc-gray fw-semibold" style="font-size: 14px;">+19% from last month</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <p class="mb-0 fw-semibold">Users</p>
                                <i class="bi bi-people fs-5 d-flex"></i>
                            </div>
                            <p class="mb-0 fs-2 fw-bold">{{ $totalUsers }}</p>
                            {{-- <p class="mb-0 fc-gray fw-semibold" style="font-size: 14px;">+180% from last month</p> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-6 col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <p class="mb-0 fw-semibold">Out of stock</p>
                                <i class="bi bi-bag-x fs-5 d-flex"></i>
                            </div>
                            <p class="mb-0 fs-2 fw-bold">0</p>
                            <p class="mb-0 fc-gray fw-semibold" style="font-size: 14px;">+100% from last month</p>
                        </div>
                    </div>
                </div> --}}
            </div>


    <x-web.footer />

