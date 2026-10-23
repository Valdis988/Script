<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Ветклініка "Лапи та Хвости"')</title>
    <style>

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f4f7f6;
            color: #333;
        }


        header {
            background-color: #20b2aa;
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        nav {
            display: flex;
            gap: 25px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 5px 10px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        main {
            flex: 1;
            padding: 40px 20px;
            max-width: 1000px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }


        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 25px 20px;
            margin-top: auto;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        }

        footer p {
            margin: 5px 0;
        }

        .footer-credits {
            font-size: 14px;
            color: #bdc3c7;
            margin-top: 10px;
        }


        nav[role="navigation"] > .flex.justify-between {
            display: none;
        }


        nav[role="navigation"] span.relative.inline-flex.items-center,
        nav[role="navigation"] a.relative.inline-flex.items-center {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 40px;
            height: 40px;
            margin: 0 4px;
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }


        nav[role="navigation"] svg {
            width: 20px;
            height: 20px;
        }

        .vet-grid { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .vet-card { width: 300px; border: 1px solid #e3e3ee; border-radius: 8px; padding: 20px; text-align: center; background: #fff; }
        .vet-position { color: #20b2aa; font-weight: 700; }
        .vet-card .actions { display: flex; gap: 10px; justify-content: center; align-items: center; }
        .form-group { margin-bottom: 15px; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; }
        .error { color: #d9534f; font-size: 14px; }
        .success { color: #2e7d32; background: #e8f5e9; padding: 10px; border-radius: 6px; }
        .filter { margin: 15px 0; }

        
        nav[role="navigation"] svg { width: 1.25rem; height: 1.25rem; }


    </style>
</head>
<body>

<!-- Головне меню -->
<header>
    <a href="{{ url('/') }}" class="logo">🐾 Вуса, Лапи, Хвіст</a>
    <nav>
        <a href="{{ url('/') }}">Головна</a>
        <a href="{{ url('/about') }}">Про нас</a>
        <a href="{{ url('/services') }}">Послуги</a>
        <a href="{{ route('veterinarians.index') }}">Ветеринари</a>
        <a href="{{ url('/booking') }}">Запис</a>
        <a href="{{ url('/contact') }}">Контакти</a>
        <a href="{{ route('country.index') }}">Країни</a>
    </nav>
</header>


<main>
    @yield('content')
</main>

<!-- Нижня частина сайту -->
<footer>
    <p>&copy; {{ date('Y') }} Ветеринарна клініка "Вуса, Лапи, Хвіст". </p>
    <p class="footer-credits">Розробив: Зуй Владислав Васильович РС-31, КПІ ім. Ігоря Сікорського</p>
</footer>

</body>
</html>
