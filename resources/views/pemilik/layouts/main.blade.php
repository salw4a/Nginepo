
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Anda - Nginepo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .bg-cream {
            background-color: #faf8f5;
        }
        .text-brown {
            color: #8b4513;
        }
        .bg-brown {
            background-color: #8b4513;
        }
        .border-brown {
            border-color: #d2b48c;
        }
        .hover-lift {
            transition: transform 0.2s ease-in-out;
        }
        .hover-lift:hover {
            transform: translateY(-4px);
        }
    </style>
</head>
<body class="bg-cream min-h-screen">
    <aside class="w-64 ...">
        @include('pemilik.components.sidebar')
    </aside>

    <main class="flex-1 ml-64 p-6">
        @yield('content')
    </main>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</body>
