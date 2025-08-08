<!-- resources/views/blog.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-50">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r p-4">
        <h2 class="text-lg font-bold mb-4">Menu</h2>
        <ul class="space-y-2">
            <li><a href="#" class="block hover:text-blue-500">Accueil</a></li>
            <li><a href="#" class="block hover:text-blue-500">Catégories</a></li>
            <li><a href="#" class="block hover:text-blue-500">À propos</a></li>
        </ul>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-6">Derniers Articles</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <article class="bg-white rounded-lg shadow p-4">
                    <img src="{{ $article->image }}" alt="Image article" class="rounded-lg mb-4">
                    <span class="text-sm text-blue-600 font-medium">{{ $article->categorie }}</span>
                    <h2 class="text-lg font-bold mt-2">{{ $article->titre }}</h2>
                    <p class="text-gray-600 mt-2">{{ Str::limit($article->description, 100) }}</p>
                    <div class="flex items-center mt-4">
                        <img src="{{ $article->auteur_image }}" class="w-10 h-10 rounded-full mr-3" alt="Auteur">
                        <span class="text-sm text-gray-700">{{ $article->auteur_nom }}</span>
                    </div>
                </article>
            @endforeach
        </div>
    </main>
</div>

</body>
</html>
