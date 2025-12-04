<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Services\StateEventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagoController extends Controller
{
    public function index() // Display a listing of the resource
    {
        //
    }

    public function create(string $id) // Show the form for creating a new resource.
    {
        $state_publication = Publicacion::select('estado')->where('id', $id)->first();

        if($state_publication->estado == 'En venta' ){

            return redirect('/');
        }

        Publicacion::where('id', $id)->update(['estado' => 'En venta']);

        $event_name = 'rollback_' . now()->format('Ymd_His_u');
        $event = StateEventService::createRollbackEvent($event_name, $id, 3);
        DB::statement($event);

        return view('payment_process');
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
