@extends('la.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">Tous les articles</h1>

    @if($blogs->isEmpty())
        <p>Aucun article trouvé.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
                <div class="border rounded shadow p-4">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Image de l'article" class="w-full h-48 object-cover mb-4 rounded">
                    @endif

                    <h2 class="text-xl font-semibold mb-2">{{ $blog->title }}</h2>
                    
                    <p class="text-gray-600 text-sm mb-2">
                        <strong>Auteur :</strong> {{ $blog->author->name ?? 'Inconnu' }} <br>
                        <strong>Catégorie :</strong> {{ $blog->category->name ?? 'Sans catégorie' }}
                    </p>

                    <p class="mb-4">{{ Str::limit($blog->description, 100) }}</p>

                    <a href="{{ route('blogs.show', $blog->id) }}" class="text-blue-600 hover:underline">Lire la suite</a>
                </div>
            @endforeach
        </div>
    
        <div class="mt-6">
            {{ $blogs->links() }}
        </div>
    @endif
</div>
@endsection
