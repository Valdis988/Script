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
    </style>
</head>
<body>

<!-- Головне меню -->
<header>
    <a href="{{ url('/') }}" class="logo">🐾 Вуса, Лапи, Хвіст</a>
    <nav>
        <a href="{{ url('/') }}">Головна</a>
        <a href="{{ url('/services') }}">Послуги</a>
        <a href="{{ url('/doctors') }}">Ветеринари</a>
        <a href="{{ url('/booking') }}">Запис</a>
        <a href="{{ url('/contact') }}">Контакти</a>
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
