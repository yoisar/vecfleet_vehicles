<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVecfleetVehicleTypeRequest;
use App\Http\Requests\UpdateVecfleetVehicleTypeRequest;
use App\Models\VecfleetVehicleType;
use Symfony\Component\HttpFoundation\Request;

class VecfleetVehicleTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->get('id') !== null) {
                $types = VecfleetVehicleType::find($request->get('id'));
            } else {
                $types = VecfleetVehicleType::all();
            }
            return $this->sendResponse($types, 'Vehicles List');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
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
     * @param  \App\Http\Requests\StoreVecfleetVehicleTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVecfleetVehicleTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VecfleetVehicleType  $vecfleetVehicleType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $vehicle = VecfleetVehicleType::find($id);
            if (is_null($vehicle)) {
                return $this->sendError('Type not found');
            } else {
                return $this->sendResponse($vehicle, 'Type retrieved successfully');
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VecfleetVehicleType  $vecfleetVehicleType
     * @return \Illuminate\Http\Response
     */
    public function edit(VecfleetVehicleType $vecfleetVehicleType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVecfleetVehicleTypeRequest  $request
     * @param  \App\Models\VecfleetVehicleType  $vecfleetVehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVecfleetVehicleTypeRequest $request, VecfleetVehicleType $vecfleetVehicleType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VecfleetVehicleType  $vecfleetVehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VecfleetVehicleType $vecfleetVehicleType)
    {
        //
    }
}
