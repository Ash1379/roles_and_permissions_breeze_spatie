<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Basic flex layout */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        .flex-container {
            display: flex;
            min-height: 100vh; /* full height */
        }
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 10px 0;
        }
        .sidebar a:hover {
            color: #3498db;
        }
        .main-content {
            flex: 1; /* take remaining space */
            padding: 20px;
            background-color: #ecf0f1;
        }
    </style>
</head>
<body>

<div class="flex-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('expenses.index') }}">Expenses</a>
        <a href="{{ route('discounts.index') }}">Discounts</a>
        <a href="{{ route('taxes.index') }}">Taxes</a>
        <a href="{{ route('sales.index') }}">Sales</a>
        <a href="{{ route('customers.index') }}">Customers</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>

    <!-- Main content -->
    <div class="main-content">
        @yield('content')
    </div>
</div>

</body>
</html>
