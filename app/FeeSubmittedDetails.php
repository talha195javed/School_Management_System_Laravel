<?php
namespace App;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class FeeSubmittedDetails extends Model
{

    protected $fillable = [
        'student_id',
        'month',
        'fee_submitted',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
