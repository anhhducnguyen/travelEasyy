<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'tbladdress';
    protected $primaryKey = 'idAddress';
    // public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idAddress', 'city', 'district', 'ward', 'detailAddress'
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'idAddress', 'idAddress');
    }
    public function tours()
    {
        return $this->hasMany(Tour::class, 'idAddress', 'idAddress');
    }
    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'idAddress', 'idAddress');
    }
    public function tourguides()
    {
        return $this->hasMany(TourGuide::class, 'idAddress', 'idAddress');
    }
}
