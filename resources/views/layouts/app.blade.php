<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Магазин')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="metro-dark">
    <nav class="navbar navbar-expand-lg navbar-dark metro-navbar">
        <div class="container">
            <a class="navbar-brand metro-brand" href="{{ route('index') }}">Магазин</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link metro-link" href="{{ route('products.index') }}">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link metro-link" href="{{ route('orders.index') }}">Заказы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link metro-link" href="{{ route('products.create') }}">Добавить товар</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 metro-container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>