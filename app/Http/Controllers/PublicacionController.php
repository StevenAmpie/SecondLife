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
        // Validate publication data
        $validated = $request->validate([
            'titulo'       => 'required|string|max:30',
            'descripcion'  => 'required|string|max:200',
            'precio'       => 'required|numeric|min:0',
            'portada'      => 'required|image|mimes:jpg,jpeg,png|max:4096',

            // Articles quantity
            'article_quantity' => 'required|integer|min:1',
        ]);

        // Upload cover image
        $portada = $request->file('portada');
        $portadaName = Str::uuid() . '.' . $portada->getClientOriginalExtension();
        $portada->storeAs('Images', $portadaName, 'public');

        // Generate publication id
        $publicacion_id = Str::uuid()->toString();

        // Create publication
        $publication = Publicacion::create([
            'id'           => $publicacion_id,
            'id_usuario'   => auth()->user()->id,
            'titulo'       => $validated['titulo'],
            'descripcion'  => $validated['descripcion'],
            'precio'       => $validated['precio'],
            'portada'      => "Images/$portadaName",

            // Fixed values not coming from the form:
            'fecha'        => now(),
            'estado'       => 'Disponible',
            'visibilidad'  => 'Visible',

            'vistas'       => 0
        ]);

        // Save each article
        $quantity = (int)$request->article_quantity;

        for ($i = 0; $i < $quantity; $i++) {

            // Build dynamic field names
            $name  = "name_article_$i";
            $kind  = "kind_article_$i";
            $brand = "brand_article_$i";
            $size  = "size_article_$i";
            $color = "color_article_$i";
            $obs   = "observations_article_$i";
            $p1    = "photo1_article_$i";
            $p2    = "photo2_article_$i";

            // Validate article fields
            $request->validate([
                $name  => 'required|string|max:30',
                $kind  => 'required|string|max:30',
                $brand => 'required|string|max:30',
                $size  => 'required|string|max:30',
                $color => 'required|string|max:30',
                $obs   => 'nullable|string|max:100',
                $p1    => 'required|image|mimes:jpg,jpeg,png|max:4096',
                $p2    => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            ]);

            // Upload image 1
            $img1 = $request->file($p1);
            $img1Name = Str::uuid() . '.' . $img1->getClientOriginalExtension();
            $img1->storeAs('Images', $img1Name, 'public');

            // Upload image 2 if exists
            $img2Name = null;
            if ($request->hasFile($p2)) {
                $img2 = $request->file($p2);
                $img2Name = Str::uuid() . '.' . $img2->getClientOriginalExtension();
                $img2->storeAs('Images', $img2Name, 'public');
            }

            // Create article
            Articulo::create([
                'id'              => Str::uuid()->toString(),
                'id_publicacion'  => $publicacion_id,
                'nombre'          => $request->$name,
                'tipo'            => $request->$kind,
                'talla'           => $request->$size,
                'marca'           => $request->$brand,
                'color'           => $request->$color,
                'observacion'     => $request->$obs,
                'img1'            => "Images/$img1Name",
                'img2'            => $img2Name ? "Images/$img2Name" : null
            ]);
        }

        // Redirect to publications page
        return redirect()->route('publicaciones.index')
            ->with('success', 'Publication created successfully');
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
