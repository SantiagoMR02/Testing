<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Http\Requests\JugadorRequest;

/**
 * Class JugadorController
 * @package App\Http\Controllers
 */
class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jugadors = Jugador::paginate();

        return view('jugador.index', compact('jugadors'))
            ->with('i', (request()->input('page', 1) - 1) * $jugadors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jugador = new Jugador();
        return view('jugador.create', compact('jugador'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JugadorRequest $request)
    {
        Jugador::create($request->validated());

        return redirect()->route('jugadors.index')
            ->with('success', 'Jugador created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jugador = Jugador::find($id);
    
        if (!$jugador) {
            return response()->json(['error' => 'Jugador no encontrado'], 404);
        }
    
        return view('jugador.show', compact('jugador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jugador = Jugador::find($id);

        return view('jugador.edit', compact('jugador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JugadorRequest $request, Jugador $jugador)
    {
        $jugador->update($request->validated());

        return redirect()->route('jugadors.index')
            ->with('success', 'Jugador updated successfully');
    }

    public function destroy($id)
    {
        Jugador::find($id)->delete();

        return redirect()->route('jugadors.index')
            ->with('success', 'Jugador deleted successfully');
    }
    
}
