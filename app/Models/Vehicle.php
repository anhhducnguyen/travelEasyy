<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'tblvehicle';
    protected $primaryKey = 'idVehicle';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idVehicle',
        'name',
        'licensePlate',
    ];
    public function tours()
    {
        return $this->hasMany(Tour::class, 'idVehicle', 'idVehicle');
    }
    
}
