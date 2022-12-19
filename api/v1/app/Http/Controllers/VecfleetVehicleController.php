<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVecfleetVehicleRequest;
use App\Http\Requests\UpdateVecfleetVehicleRequest;
use App\Http\Resources\VecfleetVehicleResource;
use App\Models\VecfleetVehicle;
use Illuminate\Support\Facades\DB;
use Validator;

class VecfleetVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vehicles = VecfleetVehicle::all();
        return response()->json([
            "success" => true,
            "message" => "Vehicles List",
            "data" => $vehicles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVecfleetVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVecfleetVehicleRequest $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $vehicle = VecfleetVehicle::create($input);
        return response()->json([
            "success" => true,
            "message" => "Vehicle created successfully.",
            "data" => $vehicle
        ]);
    }
    /**
     * Validation 
     *
     * @param [type] $input
     * @return Validator
     */
    private function validator($input)
    {
        return Validator::make($input, [
            'type' => 'required',
            'wheels' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'patent' => 'required',
            'chassis' => 'required',
            'km_traveled' => 'required'
        ]);
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
            $vehicle = VecfleetVehicle::find($id)->vehicleType()->get();
            if (is_null($vehicle)) {
                return $this->sendError('Vehicle not found.');
            }
            return response()->json([
                "success" => true,
                "message" => "Vehicle retrieved successfully.",
                "data" => $vehicle
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "success" => false,
                "message" => $th->getMessage(),
                "data" => ''
            ]);
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
            }
            $vehicle->type = $input['id_type'];
            $vehicle->wheels = $input['wheels'];
            $vehicle->brand = $input['id_brand'];
            $vehicle->model = $input['model'];
            $vehicle->patent = $input['patent'];
            $vehicle->chassis = $input['chassis'];
            $vehicle->km_traveled = $input['km_traveled'];
            //
            $vehicle->save();
            return response()->json([
                "success" => true,
                "message" => "vehicle updated successfully.",
                "data" => $vehicle
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
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
        $vehicle->delete();
        return response()->json([
            "success" => true,
            "message" => "Vehicle deleted successfully.",
            "data" => $vehicle
        ]);
    }
}
