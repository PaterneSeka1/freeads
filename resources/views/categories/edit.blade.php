@extends('lay.app')

@section('content')
<div class="container">
    <h1>Modifier la catégorie</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nom de la catégorie</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required><br><br>

        <button type="submit">Mettre à jour</button>
    </form>
</div>
@endsection
