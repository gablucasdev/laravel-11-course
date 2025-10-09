@extends('layouts.app')

@section('title', 'Postagens')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Postagens</h1>

    @auth
        <a href="{{ route('posts.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Nova Postagem
        </a>
    @endauth
</div>

@if ($posts->count())
    <div class="grid gap-6">
        @foreach ($posts as $post)
            <div class="bg-white shadow rounded-lg p-5">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:text-blue-600">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="text-gray-700 mb-3">{{ Str::limit($post->content, 150) }}</p>
                <div class="text-sm text-gray-500">
                    Publicado por <span class="font-medium">{{ $post->user->name }}</span>
                    em {{ $post->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@else
    <p class="text-gray-600">Nenhuma postagem encontrada.</p>
@endif
@endsection