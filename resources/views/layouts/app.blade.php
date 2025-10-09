<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel Posts') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-white shadow-md mb-6">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold text-blue-600">Laravel Posts</a>

            <div class="space-x-4 flex items-center">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Início</a>
                @auth
                    <a href="{{ route('posts.index') }}" class="text-gray-700 hover:text-blue-600">Postagens</a>
                    <a href="{{ route('posts.create') }}" class="text-gray-700 hover:text-blue-600">Criar Postagem</a>
                    <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-blue-600">Perfil</a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Sair</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">Entrar</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700">Registrar</a>
                @endguest
            </div>
        </div>
    </nav>

    {{-- Conteúdo principal --}}
    <main class="max-w-5xl mx-auto px-4 py-6">
        @yield('content')
    </main>

</body>
</html>
