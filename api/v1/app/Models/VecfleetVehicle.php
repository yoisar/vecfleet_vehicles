<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VecfleetVehicle extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type_id', 'wheels', 'brand_id', 'model', 'patent', 'chassis', 'km_traveled'];


    /**
     * get vehucle type
     *
     * @return void
     */
    public function type()
    {
        return $this->belongsTo(VecfleetVehicleType::class);
    }
    /**
     * get vehicle brand 
     *
     * @return void
     */
    public function brand()
    {
        return $this->belongsTo(VecfleetVehicleBrand::class);
    }
}
