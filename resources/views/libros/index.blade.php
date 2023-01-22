@extends('plantillas.uno')
@section('titulo')
    Inicio
@endsection
@section('cabecera')
    Listado Libros
@endsection
@section('contenido')
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="mb-3 flex flex-row-reverse">
                        <a href="{{route('libros.create')}}" class="mr-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-add"></i> Nuevo
                        </a>
                    </div>
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Info
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Título
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left"> {{--como vamos a ver autor aquí (atr de user) hemos implementado en el método index la carga ansiosa--}}
                                    Autor
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($libros as $item)
                                <tr class="bg-gray-100 border-b">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="{{route('libros.show', $item)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$item->titulo}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$item->user->name}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <form name="as" method="POST" action="{{route('libros.destroy', $item)}}">

                                            @csrf
                                            @method("DELETE")
                                            <a href="{{route('libros.edit', $item)}}" class="mr-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $libros->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @if (session('mensaje'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{session('mensaje')}}",
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endsection
