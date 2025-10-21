@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">
    <h1 class="text-3xl font-semibold text-gray-900 mb-2">{{ $post->title }}</h1>
    <p class="text-gray-600 mb-4">{{ $post->content }}</p>
    <p class="text-sm text-gray-500 mb-6">
        Escrito por <span class="font-medium">{{ $post->user->name }}</span>
        {{ $post->created_at->format('d/m/Y H:i') }}
    </p>

    @if($post->user_id === 1)
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('posts.edit', $post->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded transition">
            ✏️ Editar Postagem
        </a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
            onsubmit="return confirm('Tem certeza que deseja excluir esta postagem?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded transition">
                🗑️ Excluir
            </button>
        </form>
    </div>
    @endif


    <hr class="my-6">

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Comentários</h2>

    @if ($post->comments->count())
    <div class="space-y-4 mb-6">
        @foreach ($post->comments as $comment)
        <div class="border border-gray-200 rounded-lg p-3 bg-gray-50">
            <p class="text-sm text-gray-500 mt-1">
                — {{ $comment->user->name }}, {{ $comment->created_at->diffForHumans() }}
            </p>
            <p>{{ $comment->content }}</p>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-gray-600 mb-6">Nenhum comentário ainda.</p>
    @endif

    @auth
    <form action="{{ route('posts.comments.store', $post->id) }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="content" class="block text-gray-700 font-medium mb-1">Adicionar comentário</label>
            <textarea name="content" id="content" rows="3"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            @error('content')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Comentar
        </button>
    </form>
    @else
    <p class="text-gray-600 mt-4">
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Entre</a> para comentar.
    </p>
    @endauth
</div>
@endsection