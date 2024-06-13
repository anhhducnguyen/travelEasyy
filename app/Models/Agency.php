<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $table = 'tblagency';
    protected $primaryKey = 'idAgency';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'idAgency',
        'idAddress',
        'name',
        'phone',
        'idTourGuide',
    ];

    public function tourGuide()
    {
        return $this->belongsTo(TourGuide::class, 'idTourGuide', 'idTourGuide');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'idAddress', 'idAddress');
    }
}
