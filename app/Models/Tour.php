<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tbltour';
    protected $fillable = [
        'idTour', // Thêm trường idTour vào mảng fillable
        'name',
        'startDay',
        'endDay',
        'cost',
        'idAddress',
        'idHotel',
        'idVehicle',
        'idTourGuide',
    ];
}
