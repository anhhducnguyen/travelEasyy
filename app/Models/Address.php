<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'tbladdress';
    protected $primaryKey = 'idAddress';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idAddress', 'city', 'district', 'ward', 'detailAddress'
    ];
}
