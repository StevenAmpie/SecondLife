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

        $article = Articulo::find($id);

        if(!$article) return redirect('/');

        $publication = Publicacion::select('id_usuario', 'titulo')
            ->where('id', $article->id_publicacion)
            ->first();

        if(!$publication)  return redirect('/');

        if (auth()->user()->id !== $publication->id_usuario)  return redirect('/');

        return view('edit_article', ['article'=>$article, 'publication'=>$publication]);
    }

    public function update(Request $request, string $id) // Update the specified resource in storage.
    {
        $article = Articulo::find($id);
        if (!$article) return redirect('/');

        $publication = Publicacion::select('id_usuario')
            ->where('id', $article->id_publicacion)
            ->first();

        if (!$publication || auth()->user()->id !== $publication->id_usuario) {
            return redirect('/');
        }

        $validated = $request->validate([
            'name'        => 'required|string',
            'kind'        => 'required|string',
            'brand'       => 'required|string',
            'size'        => 'required|string',
            'color'       => 'required|string',
            'observations'=> 'nullable|string',
            'photo1'      => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'photo2'      => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $article->nombre      = $validated['name'];
        $article->tipo        = $validated['kind'];
        $article->marca       = $validated['brand'];
        $article->talla       = $validated['size'];
        $article->color       = $validated['color'];
        $article->observacion = $validated['observations'] ?? $article->observacion;

        if ($request->hasFile('photo1')) {
            $path1 = $request->file('photo1')->store('articles', 'public');
            $article->img1 = $path1;
        }

        if ($request->hasFile('photo2')) {
            $path2 = $request->file('photo2')->store('articles', 'public');
            $article->img2 = $path2;
        }

        $article->save();

        return redirect()->route('publications.index')->with('success', 'Artículo actualizado correctamente.');
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
