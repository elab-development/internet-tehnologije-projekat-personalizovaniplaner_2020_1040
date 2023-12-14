<?php

namespace App\Http\Controllers;
use App\Http\Resources\PlanerResource;
use App\Models\Planer;
use App\Models\User;
use Illuminate\Http\Request;

class PlanerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planers=Planer::all();
        return $planers;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Planer $planer)
    {
        return new PlanerResource($planer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planer $planer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planer $planer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planer $planer)
    {
        //
    }
}
