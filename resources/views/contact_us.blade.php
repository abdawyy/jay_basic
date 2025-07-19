<x-web.header />
<x-web.navbar />
<x-web.sidebar />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - JAY Basic</title>
       {{-- SEO META TAGS --}}
    <meta name="description" content="{{ __('web.contact_meta_description') }}">
    <meta name="keywords" content="{{ __('web.contact_meta_keywords') }}">
    <meta name="author" content="JAY Basic">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Open Graph (for social sharing) --}}
    <meta property="og:title" content="{{ __('web.title_contact') }} - JAY Basic">
    <meta property="og:description" content="{{ __('web.contact_meta_description') }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('web.title_contact') }} - JAY Basic">
    <meta name="twitter:description" content="{{ __('web.contact_meta_description') }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <style>


        .contact-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .contact-info {
            margin: 20px 0;
            text-align: center;
        }

        .contact-info p {
            margin: 10px 0;
            color: #555;
        }

        .social-icons {
            text-align: center;
            margin-top: 20px;
        }

        .social-icons a {
            margin: 0 10px;
            display: inline-block;
        }

        .social-icons img {
            width: 40px;
            height: 40px;
        }

        .contact-form {
            margin-top: 30px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .contact-form button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>


<div class="contact-container">
    <h1>{{ __('web.title_contact') }}</h1>

    <div class="contact-info">
 
        <p>{{ __('web.location') }}: Cairo, Egypt</p>
    </div>

    <div class="social-icons">
        <a href="https://www.instagram.com/jaysbasicc/" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram">
        </a>
        <a href="https://www.facebook.com/profile.php?id=61569107154988&mibextid=ZbWKwL" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/145/145802.png" alt="Facebook">
        </a>
    </div>

    <div class="contact-form">
        <form action="#" method="post">
            @csrf
            <input type="text" name="name" placeholder="{{ __('web.name_placeholder') }}" required>
            <input type="email" name="email" placeholder="{{ __('web.email_placeholder') }}" required>
            <textarea name="message" rows="5" placeholder="{{ __('web.message_placeholder') }}" required></textarea>
            <button type="submit">{{ __('web.send_button') }}</button>
        </form>
    </div>
</div>

</body>
</html>
<x-web.footer />
