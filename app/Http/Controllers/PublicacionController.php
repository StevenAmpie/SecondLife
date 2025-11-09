<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Aqui iria la vista de mis publicaciones
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aqui iria la vista de crear publicacion
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Aqui iria la vista de editar detalles de publicacion
    }

    /**
     * Show the form for editing the specified resource.
     * toDO: colocar el parametro string $id en el metodo edit, en la etapa de Backend.
     */
    public function edit()
    {
        // Aqui iria la vista de editar publicacion
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
