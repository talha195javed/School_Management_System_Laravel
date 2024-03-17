<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = 'diary';

    protected $fillable = [
        'image_name',
        'class_id'
    ];

    public static function findDiary($id)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        return self::where('class_id', $id)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function find($id)
    {
        return self::where('id', $id)->first();
    }
}
