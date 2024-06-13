<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'tblhotel';
    protected $primaryKey = 'idHotel';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idHotel',
        'idAddress',
        'name',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'idAddress', 'idAddress');
    }
}
