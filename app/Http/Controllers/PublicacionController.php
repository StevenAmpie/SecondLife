<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function index() // Display a listing of the resource.
    {
        // Retornar la vista de mis publicaciones
        $user_id = auth()->user()->id;
        $publications = Publicacion::select(['id', 'titulo', 'fecha', 'precio', 'portada', 'estado', 'visibilidad'])
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

    public function show(Request $request) // Display the specified resource.
    {
        $publications = Publicacion::where('id', $request->id)->first();

        if(!$publications) {

            return redirect(route('publicaciones.index'));
        }

        if($publications->visibilidad == 'Visible'){

            return redirect(route('publicaciones.index'));

        }

        if (auth()->user()->id !== $publications->id_usuario) {

            return redirect('/');
        }
        $articles = Articulo::where('id_publicacion', $publications->id)->get();

        return view('edit_publication', ['publication'=>$publications,
                                                'articles' => $articles]
        );
    }

    public function edit(string $id) // Show the form for editing the specified resource.
    {
        $publication = Publicacion::where('id', $id)->first();

        if(!$publication) {

            return redirect('/');
        }

        if($publication->visibilidad == 'Visible') {

            return redirect(route('publicacion.show', $publication->id))
                    ->with('error','No se puede pagar porque el autor ocultó la publicación');

        }

        if (auth()->user()->id !== $publication->id_usuario) {

            return redirect('/');
        }
        return view('general_details', ['publication'=>$publication]);
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

            'Visibilidad' => $request->Visibilidad

        ]);

        return redirect()->route('publicaciones.index');




    }

    public function destroy(string $id) // Remove the specified resource from storage.
    {
        $user_id = auth()->user()->id;

        $publication = Publicacion::select('id', 'estado', 'visibilidad')
            ->where('id_usuario', $user_id)
            ->where('id', $id)
            ->first();

        if (!$publication) {

            abort(403, message: 'No se encontró');

        }

        if($publication->estado == 'En venta'){

            return redirect()->route('publicaciones.index')
                    ->with('error','No se puede eliminar porque la publicación está en venta');

        }

        Publicacion::where('id', $id)->delete();

        return redirect()->route('publicaciones.index');
    }
}
