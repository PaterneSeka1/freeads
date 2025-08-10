@extends('la.app')

@section('content')
<div class="container">
    <h1>Créer un article</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="title">Titre</label><br>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required><br><br>

        <label for="category_id">Catégorie</label><br>
        <select name="category_id" id="category_id" required>
            <option value="">-- Choisir une catégorie --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="description">Description</label><br>
        <textarea name="description" id="description" rows="6" required>{{ old('description') }}</textarea><br><br>

        <label for="image">Image (optionnel)</label><br>
        <input type="file" name="image" id="image" accept="image/*"><br><br>

        <button type="submit">Créer</button>
    </form>
</div>
@endsection
