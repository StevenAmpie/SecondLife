<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Publicacion;
use App\Services\StateEventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    public function index() // Display a listing of the resource
    {
        //
    }

    public function create(string $id) // Show the form for creating a new resource.
    {
        $state_publication = Publicacion::select('estado', 'visibilidad')->where('id', $id)->first();

        if (!$state_publication) {

            return redirect()->route('catalogo.index')->with('error','No se encontró la publicación');

        }

        if($state_publication->estado == 'En venta'){

            return redirect()->route('catalogo.index')
                        ->with('error','La publicación ya está en un proceso de pago');


        }
        if($state_publication->visibilidad == 'Oculta'){

            return redirect()->route('catalogo.index')->with('error','No se puede pagar porque el
                                                                    autor ocultó la publicación');

        }

        Publicacion::where('id', $id)->update(['estado' => 'En venta']);

        $event_name = 'rollback_' . now()->format('Ymd_His_u');
        $event = StateEventService::createRollbackEvent($event_name, $id, 3);
        DB::statement($event);

        return view('payment_process', ['id_publication'=>$id]);
    }

    public function store(string $id) // Store a newly created resource in storage.
    {

        $publication = Publicacion::where('id', $id)->first();

        if(!$publication) return redirect()->route('catalogo.index')->with('error','No se encontró la publicación');

        if($publication->visibilidad == 'Oculta'){

            return redirect()->route('catalogo.index')->with('error','No se puede pagar porque el
                                                                    autor ocultó la publicación');


        }

        $id_usuario = auth()->user()->id;
        $monto = Publicacion::where('id', $id)->value('precio');

        Pago::create([

            'id_usuario' => $id_usuario,
            'id_publicacion' => $id,
            'monto' => $monto,
            'fecha' => now()->toDateString()

        ]);

        $publication->update(['estado' => 'Vendida']);

        return redirect('/');
    }

    public function show(string $id) // Display the specified resource.
    {
        //
    }

    public function edit(string $id) // Show the form for editing the specified resource.
    {
        //
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
