<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreVecfleetVehicleRequest;
use App\Http\Requests\UpdateVecfleetVehicleRequest;
// use App\Http\Resources\VecfleetVehicleResource;
use App\Models\VecfleetVehicle;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

// use Validator;

class VecfleetVehicleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->get('_end') !== null) {
                $limit = $request->get('_end');
                $order = $request->get('_order') ? $request->get('_order') : 'asc';
                $sort = $request->get('_sort') ?  $request->get('_sort') : 'id';
                $offset = $request->get('_start') ? $request->get('_start') : 0;
                // retireve ordered and limit vehicles list
                $vehicles = VecfleetVehicle::with(['type', 'brand'])->orderBy($sort, $order)
                    ->offset($offset)
                    ->limit($limit)
                    ->get();
            } else {
                // retireve all vehicles
                $vehicles = VecfleetVehicle::with(['type', 'brand'])->get();
            }
            return $this->sendResponse($vehicles, 'Vehicles List');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), [], $e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVecfleetVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVecfleetVehicleRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $vehicle = VecfleetVehicle::create($input);
            return $this->sendResponse($vehicle, 'Vehicle updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), [], $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VecfleetVehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $vehicle = VecfleetVehicle::with(['type', 'brand'])->find($id);
            if (is_null($vehicle)) {
                return $this->sendError('Vehicle not found');
            } else {
                return $this->sendResponse($vehicle, 'Vehicle retrieved successfully');
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), [], $e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVecfleetVehicleRequest  $request
     * @param  \App\Models\VecfleetVehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVecfleetVehicleRequest $request, VecfleetVehicle $vehicle)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $validator = $this->validator($input);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            } else {
                $vehicle->type = $input['id_type'];
                $vehicle->wheels = $input['wheels'];
                $vehicle->brand = $input['id_brand'];
                $vehicle->model = $input['model'];
                $vehicle->patent = $input['patent'];
                $vehicle->chassis = $input['chassis'];
                $vehicle->km_traveled = $input['km_traveled'];
                //
                $vehicle->save();
                return $this->sendResponse($vehicle, 'Vehicle updated successfully');
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), [], $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VecfleetVehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(VecfleetVehicle $vehicle)
    {
        try {
            $vehicle->delete();
            return $this->sendResponse($vehicle, 'Vehicle deleted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), [], $e->getCode());
        }
    }
}
