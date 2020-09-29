<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Top Links -->
    @include('admin.includes.toplinks')
</head>

<body>

    @guest
        @yield('login-form')
    @else
        <!-- Sidenav -->
        @include('admin.includes.sidenav')
        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Top nav -->
            @include('admin.includes.topnav')

            @yield('page-content')
        </div>
    @endguest

    <!--Laravel SweetAlert-->
    @include('sweetalert::alert')
    <!-- Bottom Links -->
    @include('admin.includes.bottomlinks')
</body>

</html>
