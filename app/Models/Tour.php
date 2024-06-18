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

    public function getTotalCostExpired()
    {
        $totalCost = 0;

        // Lấy danh sách các booking của tour
        $bookings = $this->bookings;

        // Lặp qua từng booking để tính tổng cost nếu tour đã expired
        foreach ($bookings as $booking) {
            if ($booking->confirmation_status === 'confirmed' && $booking->payment_status === 'paid') {
                // Kiểm tra xem ngày kết thúc của tour đã qua hay chưa
                $now = now();
                $endDay = \Carbon\Carbon::parse($this->endDay);
                if ($endDay->lessThan($now)) {
                    $totalCost += $this->cost *$booking->quantityTicket;
                }
            }
        }

        return $totalCost;
    }
}
