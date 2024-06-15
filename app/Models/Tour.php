<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tbltour';
    protected $primaryKey = 'idTour';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idTour',
        'name',
        'startDay',
        'endDay',
        'cost',
        'imageTour',
        'description',
        'idAddress',
        'idHotel',
        'idVehicle',
        'idTourGuide',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'idAddress', 'idAddress');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'idHotel', 'idHotel');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'idVehicle', 'idVehicle');
    }

    public function tourGuide()
    {
        return $this->belongsTo(TourGuide::class, 'idTourGuide', 'idTourGuide');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'idTour', 'idTour');
    }

}
