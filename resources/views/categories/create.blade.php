@extends('lay.app')

@section('content')
<div class="container">
    <h1>Créer une catégorie</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Nom de la catégorie</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required><br><br>

        <button type="submit">Créer</button>
    </form>
</div>
@endsection
