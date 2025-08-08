<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mon Blog' }}</title>
    @vite('resources/css/app.css') <!-- Tailwind -->
</head>
<body class="bg-gray-50">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-100 border-r p-4">
        <h2 class="text-lg font-bold mb-4">Menu</h2>
        <ul class="space-y-2">
            @foreach($menuItems as $item)
                <li>
                    <a href="{{ $item['url'] }}" class="block hover:text-blue-500">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>

</body>
</html>
