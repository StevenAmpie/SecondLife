<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index() // Display a listing of the resource.
    {
        return view('catalog');
    }

    public function create() // Show the form for creating a new resource.
    {

    }

    public function store(Request $request) // Store a newly created resource in storage.
    {
        //
    }

    public function show(string $id) // Display the specified resource.
    {
        return view('detail_catalogo');
    }

    public function edit(string $id) // Show the form for editing the specified resource.
    {

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
