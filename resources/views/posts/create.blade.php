@extends('layouts.app')

@section('title', 'Criar Postagem')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Criar nova postagem</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 mt-1">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-medium">Conteúdo</label>
            <textarea name="content" id="content" rows="5"
                      class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 mt-1">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="status" class="block text-gray-700 font-medium">Status</label>
                <select name="status" id="status"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 mt-1">
                    <option value="draft">Rascunho</option>
                    <option value="published">Publicado</option>
                </select>
            </div>
            <div>
                <label for="visibility" class="block text-gray-700 font-medium">Visibilidade</label>
                <select name="visibility" id="visibility"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 mt-1">
                    <option value="public">Público</option>
                    <option value="private">Privado</option>
                </select>
            </div>
        </div>

        <div class="text-right">
            <a href="{{ route('posts.index') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Publicar
            </a>
        </div>
    </form>
</div>
@endsection
