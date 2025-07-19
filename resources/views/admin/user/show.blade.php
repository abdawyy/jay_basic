<x-admin.header />
<x-admin.aside />
<x-admin.navbar />

<main id="main">
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="pagetitle">
                <h1>Users</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Users</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </nav>
            </div><!-- End Breadcrumbs with a page title -->

            <div class="container">
                <h2>User Addresses</h2>
                <div class="card mb-2">
                    <div class="card-body p-2">
                        <!-- Display all addresses -->
                        @if ($user && $user->address->isNotEmpty())
                            @foreach ($user->address as $address)
                                <div class="address-section mb-1">
                                    <p class="mb-0"><strong>Address Line 1:</strong> {{ $address->address_line1 ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>Address Line 2:</strong> {{ $address->address_line2 ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>City:</strong> {{ $address->city ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>State:</strong> {{ $address->state ?? 'N/A' }}</p>
                                    <p class="mb-0"><strong>Postal Code:</strong> {{ $address->postal_code ?? 'N/A' }}</p>
                                                            <p><strong>Mobile:</strong> {{ $address->phone_number ?? 'N/A' }}</p>

                                    <p class="mb-0"><strong>Country:</strong> {{ $address->country ?? 'N/A' }}</p>
                                    <hr class="my-1">
                                </div>
                            @endforeach
                        @else
                            <p><strong>Address:</strong> N/A</p>
                        @endif
                    </div>
                </div>

                <h2>User Orders</h2>

                <!-- Search Bar for Filtering Orders -->
                <div class="mb-3">
                    <input type="text" id="orderSearch" class="form-control" placeholder="Search Orders..." onkeyup="filterOrders()">
                </div>

                <div class="card mb-3">
                    <div class="card-body p-2">
                        <!-- Display all orders -->
                        @if ($user && $user->order->isNotEmpty())
                            <ul id="orderList" class="list-group list-group-flush">
                                @foreach ($user->order as $order)
                                    <li class="list-group-item order-item">
                                        <a href="{{ url('admin/order/edit/' . $order->id) }}">
                                            <strong>Order #{{ $order->id }}</strong>
                                        </a>
                                        <div class="order-details">
                                            <span><strong>Total:</strong> ${{ $order->total_amount ?? 'N/A' }}</span>,
                                            <span><strong>Status:</strong> {{ $order->status ?? 'Pending' }}</span>,
                                            <span><strong>Discount:</strong> {{ $order->discountCode->code ?? 'N/A' }}</span>,
                                            <span><strong>City:</strong> {{ $order->city->name ?? 'N/A' }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p><strong>Orders:</strong> No orders found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<x-web.footer />

<!-- JavaScript for Order Filtering -->
<script>
    function filterOrders() {
        const searchInput = document.getElementById('orderSearch');
        const filter = searchInput.value.toLowerCase();
        const orders = document.querySelectorAll('.order-item');

        orders.forEach(order => {
            const orderDetails = order.textContent || order.innerText;
            if (orderDetails.toLowerCase().includes(filter)) {
                order.style.display = '';
            } else {
                order.style.display = 'none';
            }
        });
    }
</script>
