<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Language" content="ar, en">

    <!-- Dynamic Title -->
    <title>
        {{ app()->getLocale() == 'ar' ? 'جاي - أزياء عصرية لكل ذوق' : 'Jay Basic - Modern Fashion for Every Style' }}
    </title>

    <!-- Dynamic Description -->
    <meta name="description" content="{{ app()->getLocale() == 'ar' ? 'تسوق الآن من جاي لأحدث صيحات الموضة والأزياء المحتشمة.' : 'Shop now at Jay Basic for the latest in modern and modest fashion.' }}">
    <meta name="keywords" content="{{ app()->getLocale() == 'ar' ? 'جاي, ملابس, أزياء, موضة, نسائية' : 'Jay Basic, fashion, clothing, modern, modest, women' }}">
    <meta name="author" content="Jay Basic Fashion">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ app()->getLocale() == 'ar' ? 'جاي - أزياء عصرية' : 'Jay Basic - Modern Fashion' }}">
    <meta property="og:description" content="{{ app()->getLocale() == 'ar' ? 'اكتشف تشكيلتنا الآن.' : 'Discover our latest collections now.' }}">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ app()->getLocale() == 'ar' ? 'جاي - أزياء عصرية' : 'Jay Basic - Modern Fashion' }}">
    <meta name="twitter:description" content="{{ app()->getLocale() == 'ar' ? 'تسوق الآن من جاي.' : 'Shop now with Jay Basic.' }}">
    <meta name="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">

    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- hreflang for multilingual SEO -->
    <link rel="alternate" hreflang="ar" href="{{ url()->current() }}?lang=ar">
    <link rel="alternate" hreflang="en" href="{{ url()->current() }}?lang=en">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
</head>
