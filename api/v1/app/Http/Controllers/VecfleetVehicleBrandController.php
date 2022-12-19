<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVecfleetVehicleBrandRequest;
use App\Http\Requests\UpdateVecfleetVehicleBrandRequest;
use App\Models\VecfleetVehicleBrand;

class VecfleetVehicleBrandController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = VecfleetVehicleBrand::all();
        try {
            return $this->sendResponse($brands, 'Vehicles List');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), [], $e->getCode());
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
     * @param  \App\Http\Requests\StoreVecfleetVehicleBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVecfleetVehicleBrandRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VecfleetVehicleBrand  $vecfleetVehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $brand = VecfleetVehicleBrand::find($id);
            if (is_null($brand)) {
                return $this->sendError('Brand not found');
            } else {
                return $this->sendResponse($brand, 'Brand retrieved successfully');
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), [], $e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VecfleetVehicleBrand  $vecfleetVehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(VecfleetVehicleBrand $vecfleetVehicleBrand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVecfleetVehicleBrandRequest  $request
     * @param  \App\Models\VecfleetVehicleBrand  $vecfleetVehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVecfleetVehicleBrandRequest $request, VecfleetVehicleBrand $vecfleetVehicleBrand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VecfleetVehicleBrand  $vecfleetVehicleBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(VecfleetVehicleBrand $vecfleetVehicleBrand)
    {
        //
    }
}
