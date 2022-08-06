<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stage
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Stage extends Model
{

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function sclasses()
    {
        return $this->hasMany(Sclass::class);
    }

    public function exams(){

        return $this->hasMany(Exam::class);
    }

    static $rules = [
		'name'      => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'subject_id'
    ];



}
