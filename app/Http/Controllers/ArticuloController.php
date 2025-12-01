<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\Publicacion;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function index() // Display a listing of the resource.
    {
        //
    }

    public function create() // Show the form for creating a new resource.
    {
        //
    }

    public function store(Request $request) // Store a newly created resource in storage.
    {
        //
    }

    public function show(string $id) // Display the specified resource.
    {
        //
    }

    public function edit(string $id) // Show the form for editing the specified resource.
    {

        $article = Articulo::select('id', 'id_publicacion')
            ->where('id', $id)
            ->first();

        if(!$article) return redirect('/');

        $publication = Publicacion::select('id_usuario')
            ->where('id', $article->id_publicacion)
            ->first();

        if(!$publication)  return redirect('/');

        if (auth()->user()->id !== $publication->id_usuario)  return redirect('/');

        return view('edit_article', ['article'=>$article]);
    }

    public function update(Request $request, string $id) // Update the specified resource in storage.
    {
        //
    }

    public function destroy(string $id) // Remove the specified resource from storage.
    {

        $article = Articulo::select('id')
            ->where('id', $id)
            ->first();

        if(!$article) return redirect('/');

        Articulo::where('id', $id)->delete();

        return redirect()->route('publicaciones.index');
    }
}
