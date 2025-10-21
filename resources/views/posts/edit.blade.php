@extends('layouts.app')

@section('title', 'Editar Postagem')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6 mt-8">
    <h1 class="text-3xl font-semibold text-gray-900 mb-6 text-center">Editar Postagem</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-gray-700 font-medium mb-2">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="content" class="block text-gray-700 font-medium mb-2">Conteúdo</label>
            <textarea name="content" id="content" rows="6"
                      class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('posts.show', $post->id) }}"
               class="text-gray-600 hover:text-gray-800">Cancelar</a>

            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Salvar Alterações
            </button>
        </div>
    </form>
</div>
@endsection
