<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogoController extends Controller
{
    public function index() // Display a listing of the resource.
    {

        $publications = Publicacion::orderBy('vistas', 'desc')
            ->where('estado', 'Disponible')
            ->get();
        if ($publications->isEmpty()) {
            return view('catalog', ['detail'=> 'No se ha encontrado', 'status' => 404]);
        }
        return view('catalog', ['publications' => $publications, 'status' => 200], );

    }


    public function search(Request $request){ // Display a listing of the searched resource


        if($request->has('query') and $request->query('query') != ''){

            $query = $request->input('query');

            $id_publications = DB::table('articulo')
                ->select('id_publicacion')
                ->whereRaw("MATCH(nombre, tipo, marca, color, observacion)
                                AGAINST(? IN BOOLEAN MODE)", [$query])
                ->distinct()
                ->pluck('id_publicacion');

            if ($id_publications->isEmpty()) {
                return view('catalog', ['detail'=> 'No se ha encontrado', 'status' => 404]);
            }

            $order = $id_publications
                ->map(fn($id) => "'" . $id . "'")
                ->implode(',');

            $publications = Publicacion::whereIn('id', $id_publications)
                ->orderByRaw("FIELD(id, $order)")
                ->get();

            return view('catalog', ['publications' => $publications, 'status' => 200]);
        }

        $publications = Publicacion::orderBy('vistas', 'desc')->get();
        if ($publications->isEmpty()) {
            return view('catalog', ['detail'=> 'No se ha encontrado', 'status' => 404]);
        }
        return view('catalog', ['publications' => $publications, 'status' => 200]);

    }

    public function filters(Request $request){ // Display a listing of the resource with filters

        $query_articulo = Articulo::query();
        $query_publication = Publicacion::query();
        $flag = false;

        if($request->hasAny(['tipo', 'marca', 'color'])){

            $flag = true;

            $inputs = $request->only(['tipo', 'marca', 'color']);

            foreach ($inputs as $campo => $valor) {

                $query_articulo->whereIn($campo, $valor);

            }

        }

        if($request->has('precio')){


            $precio = $request->input('precio');
            $precio = is_array($precio) ? $precio : [$precio];

            foreach ($precio as $valor) {

                if($valor == '10'){

                    $query_publication->orWhere('precio','<',$valor);
                }

                if($valor == '10,20'){
                    $query_publication->orWhereBetween('precio',[10,20],);
                }

                if($valor == '20,40'){


                    $query_publication->orWhereBetween('precio',[20,40]);
                }
                if($valor == '40') {

                    $query_publication->orWhere('precio', '>', $valor);
                }

            }

            if ($flag){

                $id_publications = $query_articulo->pluck('id_publicacion');
                $publications = $query_publication->whereIn('id', $id_publications )->get();

                if ($publications->isEmpty()) {
                    return view('catalog', ['detail'=> 'No se ha encontrado', 'status' => 404]);
                }
                return view('catalog', ['publications' => $publications, 'status' => 200]);

            }

            $publications = $query_publication->get();

            if ($publications->isEmpty()) {
                return view('catalog', ['detail'=> 'No se ha encontrado', 'status' => 404]);
            }

            return view('catalog', ['publications' => $publications, 'status' => 200]);
        }


        if ($flag){

            $id_publications = $query_articulo->pluck('id_publicacion');
            $publications = $query_publication->whereIn('id', $id_publications )->get();

            if ($publications->isEmpty()) {
                return view('catalog', ['detail'=> 'No se ha encontrado', 'status' => 404]);
            }

            return view('catalog', ['publications' => $publications, 'status' => 200]);

        }


        $publications = Publicacion::orderBy('vistas', 'desc')->get();

        if ($publications->isEmpty()) {
            return view('catalog', ['detail'=> 'No se ha encontrado', 'status' => 404]);
        }

        return view('catalog', ['publications' => $publications, 'status' => 200]);

    }

    public function show(string $id) // Display the specified resource.
    {
        Publicacion::where('id', $id)->increment('vistas');
        $articles = Articulo::where('id_publicacion', $id)->get();
        if ($articles->isEmpty()) {
            return view('catalog', ['detail'=> 'No se ha encontrado', 'status' => 404]);
        }
        return view('detail_catalogo', ['articles' => $articles, 'status' => 200]);
    }

}
