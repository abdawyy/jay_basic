<x-web.header />
<x-web.navbar />
<x-web.sidebar />

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation with Background Overlay</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Inline styles to mimic the CSS */
        .hero {
            position: relative;
            background-image: url({{ asset('assets/img/p-white-t-shirt-2-hero.jpeg') }}); /* Your image path */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            width: 100%;
            border-radius: 10px; /* Mimics --border-radius */
            aspect-ratio: 6/3; /* Maintains the aspect ratio */
        }

        /* Overlay effect */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.386);
            border-radius: 10px; /* Mimics --border-radius */
            transition: background-color 0.3s ease;
            z-index: 1;
        }

        .hero:hover .overlay {
            background-color: rgba(0, 0, 0, 0.23); /* Darkens on hover */
        }

        .card-content {
            position: relative;
            z-index: 2;
            color: white; /* Ensures text is visible over the overlay */
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div id="home" class="hero d-flex justify-content-center align-items-center">
        <!-- Overlay Div for Background Effect -->
        <div class="overlay"></div>

        <!-- Card Content -->
        <div class="card card-content bg-transparent text-center p-4">
            <h2>Order Confirmation</h2>
            <p>Thank you for your order!</p>
            <p>Your Order ID: <strong>#{{ $orderID }}</strong></p>
            <p>Delivery fees: <strong>{{ $deleveryFees }} LE</strong></p>

            <p>Total Price: <strong>{{ $totalPrice }} LE </strong></p>
            <a href="/" class="btn btn-primary mt-3">Back to Home</a>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<x-web.footer />
