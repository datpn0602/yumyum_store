<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>YumYum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <base href="{{ asset('') }}" >
    @include('client.layouts.head')
</head>
<body class="cms-index-index cms-home-page">
    <div id="page"> 
        <!-- Header -->
        @include('client.layouts.header')
        <!-- Slider -->
        @yield('content')
        <!-- Footer -->
        @include('client.layouts.footer')
    </div>
    <!-- End Footer --> 
    <!-- JavaScript --> 
    <base href="{{ asset('') }}" >
    @include('client.layouts.scripts')
</body>
</html>
