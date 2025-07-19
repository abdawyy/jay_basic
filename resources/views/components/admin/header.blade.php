<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset("admin/assets/css/bootstrap.min.css")}}>

    <!-- icon -->
    <link href={{ asset("admin/assets/vendors/bootstrap-icons/bootstrap-icons.css")}} rel="stylesheet">
    <link href={{ asset("admin/assets/vendors/boxicons/css/boxicons.min.css")}} rel="stylesheet">
    <!--  -->
    <!-- font 1 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <!-- font 2 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <!--  -->
    <link rel="stylesheet" href={{ asset("admin/assets/css/all.min.css")}}>
    <link rel="stylesheet" href={{ asset("admin/assets/css/style-Dashboard.css")}}>
    <title>Jay's Basic</title>
</head>
<style>
    [dir="rtl"] .sidebar {
        right: 0;
        left: auto;
    }

    [dir="rtl"] #main {
        margin-right: 300px; /* same as sidebar width */
        margin-left: 0;
    }

    [dir="ltr"] #main {
        margin-left: 300px;
        margin-right: 0;
    }
</style>
