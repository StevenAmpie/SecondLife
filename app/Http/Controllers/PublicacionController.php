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

    public function show(Request $request) // Display the specified resource.
    {
        $publication = Publicacion::where('id', $request->id)->first();

        if(!$publication) {

            return redirect('/');
        }

        if (auth()->user()->id !== $publication->id_usuario) {

            return redirect('/');
        }
        $articles = Articulo::where('id_publicacion', $publication->id)->get();

        return view('edit_publication', ['publication'=>$publication,
                                                'articles' => $articles]
        );
    }

    public function edit(string $id) // Show the form for editing the specified resource.
    {
        $publication = Publicacion::where('id', $id)->first();

        if(!$publication) {

            return redirect('/');
        }

        if (auth()->user()->id !== $publication->id_usuario) {

            return redirect('/');
        }
        return view('general_details', ['publication'=>$publication]);
    }

    public function update(Request $request, string $id) // Update the specified resource in storage.
    {

        $publication = Publicacion::where('id', $id)->first();

        if (!$publication) {
            return redirect('/');
        }

        if (auth()->user()->id !== $publication->id_usuario) {
            return redirect('/');
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'front'       => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $publication->titulo      = $validated['title'];
        $publication->descripcion = $validated['description'] ?? $publication->descripcion;
        $publication->precio      = $validated['price'];

        if ($request->hasFile('front')) {
            $img = $request->file('front');
            $extension = $img->getClientOriginalExtension();
            $filename = $id . '_portada.' . $extension;
            $img->move(public_path('images'), $filename);
            $publication->portada = 'images/' . $filename;
        }

        $publication->save();

        return redirect()
            ->route('publicaciones.show', ['id' => $publication->id])
            ->with('success', 'Detalles generales actualizados correctamente.');
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
