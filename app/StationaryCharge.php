<?php
namespace App;
use App\Student;

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationaryCharge extends Model
{

    protected $fillable = [
        'student_id',
        'stationary_details',
        'stationary_charges',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
