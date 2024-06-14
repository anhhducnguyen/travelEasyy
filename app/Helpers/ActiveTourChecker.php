<?php

namespace App\Helpers;

use App\Models\Tour;
use Carbon\Carbon;

class ActiveTourChecker
{
    /**
     * Kiểm tra xem bản ghi có liên kết với bất kỳ tour nào đang hoạt động hay không.
     *
     * @param string $column
     * @param mixed $id
     * @return bool
     */
    public static function hasActiveTours($column, $id)
    {
        return Tour::where($column, $id)
                   ->where('endDay', '>=', Carbon::now())
                   ->exists();
    }
}
