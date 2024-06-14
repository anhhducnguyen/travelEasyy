<?php

namespace App\Helpers;

class IdGenerator
{
    public static function generateId($prefix, $model, $columnName)
    {
        // Lấy bản ghi cuối cùng từ bảng
        $lastRecord = $model::orderBy($columnName, 'desc')->first();

        if ($lastRecord) {
            // Lấy ID của bản ghi cuối cùng
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
