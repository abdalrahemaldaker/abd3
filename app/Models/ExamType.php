<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExamType
 *
 * @property $id
 * @property $name
 * @property $desc
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ExamType extends Model
{

    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','desc'];


    public function exams(){

        return $this->hasMany(Exam::class);
    }

}
