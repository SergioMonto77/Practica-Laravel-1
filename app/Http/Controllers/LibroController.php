<?php

namespace App\Http\Controllers;

use App\Models\{Libro, User};
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros= Libro::orderBy('id', 'desc')->with('user')->paginate(6); //debo emplear la carga ansiosa ya que quiero ver un campo de autor(nombre) aquí || la carga ansiosa se implementa mediante '->with()'
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //para crear un nuevo libro necesitaré una lista de usuarios (con pluck le pasaré un array asociativo donde la clave será el nombre y el valor el id (muestro el nombre pero almaceno el id del seleccionado))
        $users= User::orderBy('id', 'desc')->pluck('name', 'id');
        return view('libros.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //1-validamos todo lo que nos llega por $request (todos los datos del formulario)
       $request->validate([
            'titulo'=> ['required', 'string', 'min:3', 'unique:libros,titulo'], //debe ser único en la tabla libros en el campo título
            'resumen'=> ['required', 'string', 'min:10'],
            'pvp'=> ['required', 'numeric', 'min:1', 'max:300'],
            'stock'=> ['required', 'numeric', 'min:0', 'max:150'],
            'user_id'=> ['required', 'numeric', 'exists:users,id']
       ]);

       //2-si todo ha ido bien creamos el registro y redirigimos. EOC mostramos los errores
       Libro::create($request->all()); //con $request->all() indico que me cree un nuevo registro con todos los datos que me llegan por $request de mi formulario
       /*hubiera sido lo mismo poner esto:
       Libro::create([
            'titulo'=>$request->titulo,
            'resumen'=>$request->resumen... así con todos
       ]) */
       return redirect()->route('libros.index')->with('mensaje', 'Libro Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        //para editar un libro necesitaré una lista de usuarios (con pluck le pasaré un array asociativo donde la clave será el nombre y el valor el id (muestro el nombre pero almaceno el id del seleccionado))
        $users=User::orderBy('id', 'desc')->pluck('name', 'id');
        return view('libros.edit', compact('libro', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        //1-validamos todo lo que nos llega por $request (todos los datos del formulario)
       $request->validate([
            'titulo'=> ['required', 'string', 'min:3', 'unique:libros,titulo,'.$libro->id], //debe ser único en la tabla libros en el campo título, pero OBVIANDO LA FILA CON EL ID DEL LIBRO PASADO POR PARÁMETROS
            'resumen'=> ['required', 'string', 'min:10'],
            'pvp'=> ['required', 'numeric', 'min:1', 'max:300'],
            'stock'=> ['required', 'numeric', 'min:0', 'max:150'],
            'user_id'=> ['required', 'numeric', 'exists:users,id']
        ]);

        //2-si todo ha ido bien creamos el registro y redirigimos. EOC mostramos los errores
        $libro->update($request->all()); //con $request->all() indico que me actualice el libro indicados con todos los datos que me llegan por $request de mi formulario
        /*hubiera sido lo mismo poner esto:
        $libro->update([
                'titulo'=>$request->titulo,
                'resumen'=>$request->resumen... así con todos
        ]) */
        return redirect()->route('libros.index')->with('mensaje', 'Libro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('mensaje', 'Libro Eliminado');
    }
}
