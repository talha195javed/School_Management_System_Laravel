<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaryExpenses extends Model
{
    protected $fillable = [
        'type',
        'description',
        'amount'
    ];
}
