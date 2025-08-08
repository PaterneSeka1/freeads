@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Derniers Articles</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($articles as $article)
            <article class="bg-white rounded-lg shadow p-4">
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="rounded-lg mb-4 w-full h-48 object-cover">
                <span class="text-sm text-blue-600 font-medium">{{ $article->category->name }}</span>
                <h2 class="text-lg font-bold mt-2">{{ $article->title }}</h2>
                <p class="text-gray-600 mt-2">{{ Str::limit($article->description, 100) }}</p>
                <div class="flex items-center mt-4">
                    <img src="{{ $article->author->avatar }}" class="w-10 h-10 rounded-full mr-3">
                    <span class="text-sm text-gray-700">{{ $article->author->name }}</span>
                </div>
            </article>
        @endforeach
    </div>
@endsection
    