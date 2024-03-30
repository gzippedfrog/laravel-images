<!DOCTYPE html>
<html lang="ru" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body>

<div class="container col-6 mt-5">
    <nav class="mb-3 nav">
        <a class="nav-link {{ Route::current()->getName() == 'images.index' ? 'disabled' : '' }}"
           href="{{ route('images.index') }}">Главная</a>
        <a class="nav-link {{ Route::current()->getName() == 'images.create' ? 'disabled' : '' }}"
           href="{{ route('images.create') }}">Загрузить</a>
    </nav>

    @yield('content')
</div>
</body>
</html>
