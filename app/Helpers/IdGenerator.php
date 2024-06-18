<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class IdGenerator
{
    public static function generateId($prefix, $model, $columnName)
{
    // Lấy bản ghi có ID lớn nhất từ bảng
    $lastRecord = $model::select($columnName)
                        ->where($columnName, 'LIKE', $prefix . '%')
                        ->orderBy(DB::raw('SUBSTRING(' . $columnName . ', ' . (strlen($prefix) + 1) . ') + 0'), 'DESC')
                        ->first();

    if ($lastRecord) {
        // Lấy ID của bản ghi có ID lớn nhất
        $lastId = $lastRecord->$columnName;

        // Cắt bỏ phần prefix
        $numberPart = substr($lastId, strlen($prefix));

        // Chuyển phần còn lại thành số và tăng lên 1
        $newNumber = intval($numberPart) + 1;

        // Tạo ID mới
        $newId = $prefix . $newNumber;
    } else {
        // Trường hợp bảng chưa có bản ghi nào
        $newId = $prefix . '1';
    }

    return $newId;
}

}
