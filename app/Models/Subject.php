<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subject
 *
 * @property $id
 * @property $name
 * @property $stage_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Subject extends Model
{


    public function stage()
    {
        return $this->belongsTo(stage::class);
    }

    public function courses()
    {
        return $this->hasMany(courses::class);
    }

    static $rules = [
		'name' => 'required',
		'stage_id'  => 'required|exists:stages,id'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','stage_id'];

    protected $attributes= [
        'max'    => 0,
    ];

}


