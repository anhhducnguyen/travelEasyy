<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $primaryKey = 'idCustomer';
    protected $table = 'tblcustomer'; 
    // protected $primaryKey = 'idCustomer'; 
    // public $incrementing = false; 
    // protected $keyType = 'string'; 

    protected $fillable = [
        'idCustomer', 'idAddress', 'name', 'phone', 'email', 'password'
    ];

    public static function getCustomer()
    {
        return self::select('idCustomer', 'name', 'email', 'password')->get();
    }
    public static function insertCustomer(array $data)
    {
        // Sử dụng create() để chèn dữ liệu và trả về instance của model vừa được tạo
        return self::create($data);
    }

}

