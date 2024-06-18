<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotelModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'idHotel';
    protected $table = 'tblhotel'; 
    protected $fillable = [
        'idHotel', 'idAddress', 'name',
    ];
    public static function getCustomer()
    {
        return self::select('idHotel', 'idAddress', 'name')->get();
    }
    
}
