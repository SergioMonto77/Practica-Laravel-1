@extends('plantillas.uno')
@section('titulo')
    Editar
@endsection
@section('cabecera')
    Editar Libro
@endsection
@section('contenido')

    {{--
        ==================>IMPORTANTE: he realizado el formulario CON y SIN protonemedia
        Actualmente está visible el implementado con esta librería.
        Si se quiere cambiar de formulario tan solo hay que quitar el atributo 'hidden' de la clase del primer formulario
        y ponerlo en el segundo formulario
    --}}

    <!--formulario SIN PROTONEMEDIA-->
    <form name="as" method="POST" action="{{route('libros.update', $libro)}}" class="hidden bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2 mx-auto">

        @csrf
        @method("PUT")

        <div class="mb-6">
            <label for="t" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
            <input name="titulo" value="{{old('titulo', $libro->titulo)}}" type="text" id="t" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Título">
            @error('titulo')
                <p class="mt-2 text-red-800 text-sm">***{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="r" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resumen</label>
            <input name="resumen" value="{{old('resumen', $libro->resumen)}}" type="text" id="r" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Resumen">
            @error('resumen')
                <p class="mt-2 text-red-800 text-sm">***{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="p" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio (€)</label>
            <input name="pvp" value="{{old('pvp', $libro->pvp)}}" type="number" step="0.1" id="p" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Precio">
            @error('pvp')
                <p class="mt-2 text-red-800 text-sm">***{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="s" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
            <input name="stock" value="{{old('stock', $libro->stock)}}" type="number" step="1" id="s" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Stock">
            @error('stock')
                <p class="mt-2 text-red-800 text-sm">***{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="u" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
            <select name="user_id" id="u" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($users as $k=>$v)
                    <option value="{{$k}}" @selected($k==old('user_id', $libro->user_id))>{{$v}}</option> {{--muestro los nombres pero guardo los id (gracias a ->pluck('clave', 'valor'))--}}
                @endforeach {{--en @selected para comparar con el old uso k y no v ya que aunque se muestre v(name) realmente se guarda k(id)--}}
            </select>
            @error('user_id')
                <p class="mt-2 text-red-800 text-sm">***{{$message}}</p>
            @enderror
        </div>

        <div class="flex flex-row-reverse" >
            <button type="submit" class="mr-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save"></i> Editar
            </button>
            
            <a href="{{route('libros.index')}}" class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-backward"></i> Volver
            </a>
        </div>
    </form>



    <!--formulario CON PROTONEMEDIA (no tengo que poner csrf, error, old...)-->
    <x-form name="ass" action="{{route('libros.update', $libro)}}" class="bg-gray shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2 mx-auto">

        @method("PUT")

        @bind($libro)
        <x-form-input name="titulo" type="text" label="Título" />
        <x-form-input name="resumen" type="text" label="Resumen" />
        <x-form-input name="pvp" type="number" step="0.01" label="Precio (€)" />
        <x-form-input name="stock" type="number" step="1" label="Stock" />
        <x-form-select name="user_id" label="User" :options="$users"/>
        @endbind

        <div class="flex flex-row-reverse mt-4" >
            <button type="submit" class="mr-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save"></i> Editar
            </button>
            
            <a href="{{route('libros.index')}}" class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-backward"></i> Volver
            </a>
        </div>

    </x-form>


@endsection
