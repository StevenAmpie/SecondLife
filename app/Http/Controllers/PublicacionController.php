<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index() // Display a listing of the resource.
    {
        // Retornar la vista de mis publicaciones
    }

    public function create() // Show the form for creating a new resource.
    {
        return view('publish');
    }

    public function store(Request $request) // Store a newly created resource in storage.
    {
        //
    }

    public function show(string $id) // Display the specified resource.
    {
        // Retornar la vista de editar publicación
    }

    //////////////////////////////////////////////////////////////////////
    // RECORDAR COLOCAR EL string $id PARA RECIBIR EL ID DE LA PUBLICACIÓN
    //////////////////////////////////////////////////////////////////////
    public function edit() // Show the form for editing the specified resource.
    {
        return view('general_details');
    }

    public function update(Request $request, string $id) // Update the specified resource in storage.
    {
        //
    }

    public function destroy(string $id) // Remove the specified resource from storage.
    {
        //
    }
}
