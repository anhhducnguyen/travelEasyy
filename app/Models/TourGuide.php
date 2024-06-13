<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    use HasFactory;
    protected $table = 'tbltourguide';
    protected $primaryKey = 'idTourGuide';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idTourGuide', 'idAddress', 'name', 'phone', 'email'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'idAddress', 'idAddress');
    }
    public function agencies()
    {
        return $this->hasMany(Agency::class, 'idTourGuide', 'idTourGuide');
    }
}
