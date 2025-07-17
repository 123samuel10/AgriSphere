@extends('layouts.app')

@section('title', 'Usuarios Registrados')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h2 class="text-center text-4xl font-extrabold mb-12 text-green-800">
        Usuarios Registrados
    </h2>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-green-900 text-white">
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-6 py-4">{{ $usuario->id }}</td>
                    <td class="px-6 py-4">{{ $usuario->name }}</td>
                    <td class="px-6 py-4">{{ $usuario->email }}</td>
                    <td class="px-6 py-4">{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
