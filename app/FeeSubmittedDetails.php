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
        'pay_paid',
        'teacher_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
