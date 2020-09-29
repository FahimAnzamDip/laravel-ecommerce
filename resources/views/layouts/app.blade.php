<!doctype html>
<html class="no-js" lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="description" content="Default Description">
    <meta name="keywords" content="E-commerce" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.toplinks')
</head>

<body>

<!-- Wrapper Start -->

<div class="wrapper">

    <!-- Header Area Start -->
    @include('includes.header')
    <!-- Header Area End -->

    @yield('page-content')

    <!-- Footer Start -->
    @include('includes.footer')
    <!-- Footer End -->

    <!-- Quick View Content Start -->
    @include('includes.sections.product_quickview')
    <!-- Quick View Content End -->

</div>
<!-- Wrapper End -->

<!-- Laravel SweetAlert -->
@include('sweetalert::alert')

@include('includes.bottomlinks')
</body>

</html>
