<x-web.header />
<x-web.navbar />
<x-web.sidebar />


<section id="oneProduct" class="pb-5">
    <div class="container py-5">
        <div class="row ">
            <div class="col-12 col-lg-6">
                <div class="row">
                    <!-- Main image -->
                    <div class="col-12 px-2" style="margin-bottom: 12px;">
                        <img id="mainImage" class="img-fluid img-oneProduct pointer"
                            src="{{ $product->productImages->first() ? asset('storage/' . $product->productImages->first()->images) : asset('assets/img/default-image.jpg') }}"
                            alt="{{ $product->name }}" onclick="openImage(this)">
                    </div>

                    <!-- Thumbnails -->
                    @foreach ($product->productImages as $productImage)
                        <div class="col-3 px-2">
                            <img class="img-fluid img-oneProduct-sub pointer {{ $loop->first ? 'img-selected' : '' }}"
                                src="{{ asset('storage/' . $productImage->images) }}" alt="{{ $product->name }}"
                                onclick="changeMainImage(this)">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-lg-6 pt-4 pt-lg-0 pb-5">
                <!-- Product stock status -->
                <div class="d-flex pb-3 gap-2">
                    @php
                    $totalQuantity = $product->productItems->sum('quantity');
                @endphp

                @if ($totalQuantity > 0)
                    <span class="inStock px-3 fw-semibold">In Stock</span>
                @else
                    <span class="outStock px-3 fw-semibold">Out of Stock</span>
                @endif

                </div>

                <!-- Product title and bestseller status -->
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="fw-semibold fs-3">{{ $product->name }}</h1>
                    {{-- @if ($product->is_best_seller)
                        <span class="bestSelar px-3 fw-semibold">BEST SELLER</span>
                    @endif --}}
                </div>

                <!-- Product price -->
                <h2 class="fw-bolder fs-2">
                    @if ($product->sale)
                        <span class=" mx-3 text-decoration-line-through fw-normal fst-italic fc-gray">
                            {{ $product->price }} LE
                              </span>
                        {{ $product->price - ($product->price * $product->sale / 100) }} LE
                    @else
                        {{ $product->price }} LE
                    @endif
                </h2>


                <!-- Product description -->
                <p class="fs-5 fw-bolder mb-0 pt-2">Description:</p>
                <p class="lh-sm">{{ $product->description }}</p>

                <!-- Product color -->
                <div class="d-flex gap-2 flex-column">
                    <span class="fs-5 fw-bolder">Color:</span>
                    <div class="d-flex align-items-center gap-2 warp">
                        <input type="radio" class="btn-check" name="color" id="{{ $product->color }}"
                            autocomplete="off" checked>
                        <label class="color-checked px-3 py-1 fw-semibold pointer" for="{{ $product->color }}">
                            {{ ucfirst($product->color) }}
                        </label>
                    </div>
                </div>

<!-- Quantity section -->
<div class="d-flex gap-2 align-items-center mt-3">
    <span class="fs-5 fw-bolder">Quantity:</span>
    <div class="quantity-control d-flex align-items-center gap-2">
        <button type="button" class="btn btn-outline-secondary" id="decrease-qty" onclick="changeQuantity(-1)">-</button>
        <input type="number" class="form-control text-center" id="quantity" name="quantity" value="1" min="1" max="10">
        <button type="button" class="btn btn-outline-secondary" id="increase-qty" onclick="changeQuantity(1)">+</button>
    </div>
</div>
                <!-- Product sizes -->
                <div class="d-flex gap-2 flex-column pt-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="fs-5 fw-bolder">Size:</span>
                        <span class="fs-6 fw-normal pointer" data-bs-toggle="modal" data-bs-target="#sizeModal"
                            style="text-decoration: underline; text-underline-offset: 2px;">What's my size?</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 warp">
                        @foreach ($product->productItems as $productItem)
                            @if ($productItem->quantity !== null) {{-- Skip if quantity is NULL --}}
                                <input type="radio" class="btn-check" name="productItem_id" id="{{ $productItem->size }}"
                                    value="{{ $productItem->id }}" autocomplete="off"
                                    @if ($productItem->quantity <= 0) disabled @endif>
                                <label class="color-checked px-3 py-1 fw-semibold pointer"
                                    for="{{ $productItem->size }}"
                                    style="@if ($productItem->quantity <= 0) opacity: 0.5; @endif">
                                    {{ $productItem->size }}
                                </label>
                            @endif
                        @endforeach
                    </div>




                </div>

                <!-- Buy and Add to cart buttons -->
                <div class="row pt-4">

                    <div class="col-5">
                        <button class="outlineBtn w-100 fw-semibold" style="padding: 12px 0px;"
                            onclick="addToCart({{ $product->id }})">Add to cart</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal for size guide -->
    <div class="modal fade" id="sizeModal" tabindex="-1" aria-labelledby="sizeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sizeModalLabel">What's my size</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid" src="{{ asset('assets/img/whatMySize.png') }}" alt="Size Guide">
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Get all the radio options
    const radioOptions = document.querySelectorAll('.radio-option input[type="radio"]');

    radioOptions.forEach((radio) => {
        radio.addEventListener('change', function() {
            // Remove the 'active' class from all radio options
            document.querySelectorAll('.radio-option').forEach(option => {
                option.style.borderColor = 'transparent'; // Remove the red border from all
            });

            // Add a red border to the parent radio-option of the checked input
            if (this.checked) {
                this.closest('.radio-option').style.borderColor =
                    'black'; // Apply red border to checked radio
            }
        });
    });



    function changeMainImage(smallImage) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = smallImage.src;

        // Optional: Add active class to the clicked thumbnail
        const thumbnails = document.querySelectorAll('.img-oneProduct-sub');
        thumbnails.forEach(thumb => thumb.classList.remove('img-selected'));
        smallImage.classList.add('img-selected');
    }

    function openImage(img) {
        // Create a div element for the overlay
        var overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        overlay.style.display = 'flex';
        overlay.style.alignItems = 'center';
        overlay.style.justifyContent = 'center';
        overlay.style.zIndex = '999999999999';

        // Create an image element to display the clicked image
        var largeImg = document.createElement('img');
        largeImg.src = img.src;
        largeImg.style.maxWidth = '90%';
        largeImg.style.maxHeight = '90%';

        // Add the image to the overlay
        overlay.appendChild(largeImg);

        // Add the overlay to the body
        document.body.appendChild(overlay);

        // Close the overlay when clicking outside the image
        overlay.onclick = function(event) {
            if (event.target === overlay) {
                document.body.removeChild(overlay);
            }
        };
    }
</script>
<x-web.footer />
<script>
function addToCart(productId) {
    let selectedSize = document.querySelector('input[name="productItem_id"]:checked');
    let qtyInput = document.getElementById('quantity');

    if (!selectedSize) {
        alert("Please select a size before adding to cart.");
        return;
    }

    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId,
            size_id: selectedSize.value,
            quantity: qtyInput.value
        })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(data => {
                if (response.status === 401) {
                    Toastify({
                        text: "Unauthorized access! Redirecting to login...",
                        duration: 3000,
                        gravity: "top",
                        position: 'right',
                        backgroundColor: "orange",
                        stopOnFocus: true
                    }).showToast();

                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 3000);
                }
                throw new Error(data.message);
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Update cart count dynamically
            let cartBadge = document.querySelector('.cart-Notify');
            let newCartCount = data.cartCount > 9 ? '+9' : data.cartCount;
            cartBadge.textContent = newCartCount; // Update the cart count badge

            // Show success message
            Toastify({
                text: data.message,
                duration: 3000,
                gravity: "top",
                position: 'right',
                backgroundColor: "green",
                stopOnFocus: true
            }).showToast();
        }
    })
    .catch(error => {
        Toastify({
            text: error.message,
            duration: 3000,
            gravity: "top",
            position: 'right',
            backgroundColor: "red",
            stopOnFocus: true
        }).showToast();
    });
}



    function buyNow(productId) {
        // Get the selected size
        let selectedSize = document.querySelector('input[name="productItem_id"]:checked');

        // Check if a size is selected
        if (!selectedSize) {
            alert("Please select a size before proceeding to checkout.");
            return;
        }

        // Get the selected color

        // Send AJAX request to add product to the cart, then redirect to checkout
        fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content') // For Laravel CSRF protection
                },
                body: JSON.stringify({
                    product_id: productId,
                    size_id: selectedSize.value,
                    quantity:currentQty

                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success toast notification
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        gravity: "top",
                        position: 'right',
                        backgroundColor: "green",
                        stopOnFocus: true
                    }).showToast();
                } else if (response.status === 401) {
                    // If user is not authenticated, redirect to login page
                    window.location.href = data.redirect;
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
<script>
    function changeQuantity(amount) {
        let qtyInput = document.getElementById('quantity');
        let currentQty = parseInt(qtyInput.value);

        // Prevent negative or zero quantities
        if (currentQty + amount > 0) {
            qtyInput.value = currentQty + amount;
        }
    }
</script>
