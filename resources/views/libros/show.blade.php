@extends('plantillas.uno')
@section('titulo')
    Datos
@endsection
@section('cabecera')
    Información sobre este libro
@endsection
@section('contenido')
    <div class="flex justify-center">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">

            <h5 class="text-gray-900 text-xl text-center leading-tight font-medium mb-2">{{$libro->titulo}}</h5>
            <p class="text-gray-700 text-base mb-4">
                {{$libro->resumen}}
            </p>
            <p class="text-gray-700 text-base mb-4">
                <b>Precio(€):</b> {{$libro->pvp}}
            </p>
            <p class="text-gray-700 text-base mb-4">
                <b>Stock:</b> {{$libro->stock}}
            </p>
            <p class="text-gray-700 text-base mb-4">
                <b>User:</b> {{$libro->user->name}}
            </p>
            <a href="{{route('libros.index')}}" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <i class="fas fa-backward"></i> Volver
            </a>

        </div>
    </div>
@endsection
