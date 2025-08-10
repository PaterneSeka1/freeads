@extends('la.app')

@section('content')
<div class="container">
    <h1>Mes articles de blog</h1>

    @if(session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('blogs.create') }}">Créer un nouvel article</a>

    @if($blogs->isEmpty())
        <p>Aucun article publié pour le moment.</p>
    @else
        <ul>
            @foreach($blogs as $blog)
                <li style="margin-bottom: 2rem;">
                    <h3>{{ $blog->title }}</h3>
                    <p><strong>Catégorie :</strong> {{ $blog->category->name }}</p>
                    <p><strong>Auteur :</strong> {{ $blog->author->name }}</p>
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Image" width="150" style="display:block; margin-bottom:1rem;">
                    @endif
                    <p>{{ Str::limit($blog->description, 150) }}</p>

                    <a href="{{ route('blogs.edit', $blog->id) }}" style="margin-right: 1rem;">Modifier</a>

                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Confirmer la suppression ?')" type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
