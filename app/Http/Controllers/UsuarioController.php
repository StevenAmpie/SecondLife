<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        $usuarios = Usuario::all();
        return compact('usuarios');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Usuario::create($request->all());
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = Usuario::where('id', $id)->first();
        return view('catalog/{id}', ['usuario' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {

            return "Usuario no encontrado";
        }

        $usuario->update($request->all());

        return redirect('/catalog{id}');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Usuario = Usuario::find($id);

        if (!$Usuario) {
            return "Usuario no encontrado";
        }
        $Usuario->delete();
        return redirect('/home');
    }
}
