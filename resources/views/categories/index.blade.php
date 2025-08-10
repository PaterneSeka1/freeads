@extends('lay.app')

@section('content')
<div class="container">
    <h1>Liste des catégories</h1>

    @if(session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('categories.create') }}">Créer une catégorie</a>

    <ul>
        @foreach($categories as $category)
            <li>
                <strong>{{ $category->name }}</strong>
                <a href="{{ route('categories.edit', $category->id) }}">Modifier</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
