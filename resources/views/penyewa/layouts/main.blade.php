<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Nginepô')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FEFBF6;
        }
        .bg-brand-brown-dark { background-color: #6a4f4b; }
        .bg-brand-brown-light { background-color: #e4d5c7; }
        .text-brand-brown-dark { color: #6a4f4b; }
        .hover\:bg-brand-brown-darker:hover { background-color: #594440; }
    </style>
</head>

<body class="font-poppins flex flex-col min-h-screen">
    @include('penyewa.components.navbar')
    <main class="flex-grow container mx-auto px-6 py-12">
        @yield('content')
    </main>
    @include('penyewa.components.footer')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
