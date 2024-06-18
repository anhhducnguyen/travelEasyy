<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $primaryKey = 'idBooking'; // Khai báo khóa chính của bảng
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'idBooking',
        'idUser',
        'idTour',
        'quantityTicket',
        'confirmation_status',
        'payment_status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'idTour', 'idTour');
    }
}
