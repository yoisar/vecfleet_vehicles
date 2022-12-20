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
     * Get the car's owner.
     */
    public function type()
    {
        return $this->hasOne(VecfleetVehicleType::class,'id','type_id');
    }
}
