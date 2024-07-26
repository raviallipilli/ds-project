<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Simple App')</title>
    <!-- Link to the application's CSS file for styling -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @include('layouts.header') <!-- Include the header -->
    <div class="container">
        @yield('content') <!-- Yield content from child views -->
    </div>
    @include('layouts.footer') <!-- Include the footer -->
</body>
</html>
