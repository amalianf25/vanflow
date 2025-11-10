<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(160deg, #3366FF 0%, #6AA9FF 100%);
        }
        .rounded-shape {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            width: 280px;
            height: 280px;
        }
        input:focus {
            outline: none;
            border-color: #0057B1;
            box-shadow: 0 0 0 2px rgba(0, 87, 177, 0.2);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    @yield('content')
</body>
</html>
