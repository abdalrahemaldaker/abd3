<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 *
 * @property $id
 * @property $name
 * @property $sclass_id
 * @property $teacher_id
 * @property $subject_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Sclass $sclass
 * @property Subject $subject
 * @property Teacher $teacher
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Course extends Model
{

    static $rules = [
		'name' => 'required',

		'teacher_id' => 'required',
		'subject_id' => 'required',
        'max'        => 'required|numeric'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','sclass_id','teacher_id','subject_id','max'];



    protected function teacher_id(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? $value : 'null',
        );
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sclass()
    {
        return $this->hasOne('App\Models\Sclass', 'id', 'sclass_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subject()
    {
        return $this->hasOne('App\Models\Subject', 'id', 'subject_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher()
    {
        return $this->hasOne('App\Models\Teacher', 'id', 'teacher_id');
    }


    public function examResults(){

        return $this->hasMany(ExamResult::class);
    }



}
