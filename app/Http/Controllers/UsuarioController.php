<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(): array // Display a listing of the resource.
    {
        $usuarios = Usuario::all();
        return compact('usuarios');
    }

    public function create() // Show the form for creating a new resource.
    {
        return view('register');
    }

    public function store(Request $request) // Store a newly created resource in storage.
    {
        Usuario::create($request->all());
        return redirect('/login');
    }

    public function show(string $id) // isplay the specified resource.
    {
        $id = Usuario::where('id', $id)->first();
        return view('catalog/{id}', ['usuario' => $id]);
    }

    public function edit(string $id) // Show the form for editing the specified resource.
    {
        //
    }

    public function update(Request $request, string $id) // Update the specified resource in storage.
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return "Usuario no encontrado";
        }

        $usuario->update($request->all());
        return redirect('/catalog/{id}');
    }

    public function destroy(string $id) // Remove the specified resource from storage.
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return "Usuario no encontrado";
        }

        $usuario->delete();
        return redirect('/home');
    }
}
