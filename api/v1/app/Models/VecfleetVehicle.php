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
    protected $fillable = ['id_type', 'wheels', 'id_brand', 'model', 'patent', 'chassis', 'km_traveled'];


    /**
     * Get the car's owner.
     */
    public function vehicleType()
    {
        return $this->hasOne(VecfleetVehicleType::class,'type','type');
    }
}
