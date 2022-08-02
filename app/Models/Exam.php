<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Exam
 *
 * @property $id
 * @property $name
 * @property $year_id
 * @property $exam_type_id
 * @property $date
 * @property $created_at
 * @property $updated_at
 *
 * @property ExamType $examType
 * @property Year $year
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Exam extends Model
{

    static $rules = [
		'name' => 'required',
		'year_id' => 'required',
		'exam_type_id' => 'required',
		'date' => 'required',
        'stage_id' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','year_id','exam_type_id','date','stage_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function examType()
    {
        // return $this->hasOne('App\Models\ExamType', 'id', 'exam_type_id');
        return $this->belongsTo(ExamType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function year()
    {
        // return $this->hasOne('App\Models\Year', 'id', 'year_id');
        return $this->belongsTo(Year::class);
    }

    public function stage()
    {
        // return $this->hasOne('App\Models\Year', 'id', 'year_id');
        return $this->belongsTo(Stage::class);
    }

}
