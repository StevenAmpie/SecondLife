<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index() // Display a listing of the resource.
    {
        // Retornar la vista de mis publicaciones
        $user_id = auth()->user()->id;
        $publications = Publicacion::select(['id', 'titulo', 'fecha', 'precio', 'estado', 'portada'])
            ->where('id_usuario', $user_id)
            ->get();

        if ($publications->isEmpty()) {

            return view('my_publications', ['detail' => 'No tienes publicaciones', 'status'=>404]);

        }

        return view('my_publications', ['publications' => $publications, 'status'=>200]);
    }

    public function create() // Show the form for creating a new resource.
    {
        return view('publish');
    }

    public function store(Request $request) // Store a newly created resource in storage.
    {
        //
    }

    public function show(string $id="") // Display the specified resource.
    {
        return view('edit_publication');
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

    public function updateState(Request $request, string $id){

        $user_id = auth()->user()->id;

        $id_validate = Publicacion::select('id')
            ->where('id_usuario', $user_id)
            ->where('id', $id)
            ->first();

        if (!$id_validate) {

            abort(403);

        }

        Publicacion::where('id', $id)->update([

            'estado' => $request->estado

        ]);

        return redirect()->route('publicaciones.index');




    }

    public function destroy(string $id) // Remove the specified resource from storage.
    {
        $user_id = auth()->user()->id;

        $id_validate = Publicacion::select('id')
            ->where('id_usuario', $user_id)
            ->where('id', $id)
            ->first();

        if (!$id_validate) {

            abort(403);

        }

        Publicacion::where('id', $id)->delete();

        return redirect()->route('publicaciones.index');
    }
}
