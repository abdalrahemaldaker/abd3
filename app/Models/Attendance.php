<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Attendance
 *
 * @property $id
 * @property $date
 * @property $student_id
 * @property $status
 * @property $remark
 * @property $created_at
 * @property $updated_at
 *
 * @property Student $student
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Attendance extends Model
{

    static $rules = [
		'date' => 'required',
		'student_id' => 'required',
		'status' => 'required',
		'remark' => 'required',
    ];


    // protected $attributes= [
    //     'status'    => false,
    // ];


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','student_id','status','remark'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }


}
