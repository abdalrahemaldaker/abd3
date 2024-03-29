<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Year
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Year extends Model
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
    protected $fillable = ['name'];


    public function sclasses()
    {
        return $this->hasMany(Sclass::class);
    }

    public function exams(){

        return $this->hasMany(Exam::class);
    }


}
