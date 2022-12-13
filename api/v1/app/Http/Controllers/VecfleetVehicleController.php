<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVecfleetVehicleRequest;
use App\Http\Requests\UpdateVecfleetVehicleRequest;
use App\Http\Resources\VecfleetVehicleResource;
use App\Models\VecfleetVehicle;
use Illuminate\Http\Response;

class VecfleetVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new VecfleetVehicleResource(VecfleetVehicle::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVecfleetVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVecfleetVehicleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VecfleetVehicle  $vecfleetVehicle
     * @return \Illuminate\Http\Response
     */
    public function show(VecfleetVehicle $vecfleetVehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VecfleetVehicle  $vecfleetVehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(VecfleetVehicle $vecfleetVehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVecfleetVehicleRequest  $request
     * @param  \App\Models\VecfleetVehicle  $vecfleetVehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVecfleetVehicleRequest $request, VecfleetVehicle $vecfleetVehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VecfleetVehicle  $vecfleetVehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(VecfleetVehicle $vecfleetVehicle)
    {
        //
    }
}
