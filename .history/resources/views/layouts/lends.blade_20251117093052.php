<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Lends Management')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('lends.index') }}">Lends</a>
        <a href="{{ route('payments.index') }}">Payments</a>
        <!-- Add more links if needed -->
    </nav>

    <div class="container mt-4">
        @yield('content') {{-- This is where the Lends pages content will appear --}}
    </div>
</body>
</html>
