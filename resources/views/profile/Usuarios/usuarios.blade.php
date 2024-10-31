<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('layouts.sidebar')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-1/5"></aside>

        <!-- Page Content -->
        <main class="flex-1 p-4 mt-20">
            <div class="container mx-auto py-8">
                <h1 class="text-3xl font-bold mb-4 text-gray-800">Listado de Usuarios</h1>

                {{-- Botón de Registro y Buscador 
                <div class="flex items-center justify-between mb-4">
                    <a href="{{ route('usuarios.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Registrar Nuevo Usuario
                    </a>--}}

                    <!-- Buscador -->
                    <div class="relative w-full max-w-sm ml-auto">
                        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Buscar usuario..."
                            class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition duration-300">
                    </div>
                </div>

                <!-- Tabla de Usuarios -->
                <table id="userTable" class="min-w-full bg-white shadow-md rounded-lg mt-3">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr class="text-left">
                            <th class="px-6 py-3">CI</th>
                            <th class="px-6 py-3">Nombre del Usuario</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Rol</th>
                            <th class="px-6 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($users as $usuario)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 text-center">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->email ?? 'No especificado' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->role->nombre ?? 'Sin rol asignado' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                        Editar
                                    </a>
                                    <form action="{{ route('usuarios.delete', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- JavaScript para el filtro de la tabla -->
    <script>
        function filterTable() {
            const searchInput = document.getElementById("searchInput").value.toLowerCase();
            const table = document.getElementById("userTable");
            const rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                let match = false;

                for (let j = 0; j < cells.length; j++) {
                    const cellContent = cells[j].textContent || cells[j].innerText;
                    if (cellContent.toLowerCase().includes(searchInput)) {
                        match = true;
                        break;
                    }
                }

                rows[i].style.display = match ? "" : "none";
            }
        }
    </script>
</body>
</html>
