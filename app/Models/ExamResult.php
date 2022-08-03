<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExamResult
 *
 * @property $id
 * @property $exam_id
 * @property $student_id
 * @property $course_id
 * @property $mark
 * @property $created_at
 * @property $updated_at
 *
 * @property Course $course
 * @property Exam $exam
 * @property Student $student
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ExamResult extends Model
{

    static $rules = [
		'exam_id' => 'required|exists:exams,id',
		'student_id' => 'required|exists:students,id',
		'course_id' => 'required|exists:courses,id',
		'mark' => 'required|numeric',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['exam_id','student_id','course_id','mark'];

    protected $attributes= [
        'mark'  =>  '0'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->belongsTo(student::class);
        // return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }


}
