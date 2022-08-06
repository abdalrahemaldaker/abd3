<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sclass
 *
 * @property $year_id
 * @property $stage_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Stage $stage
 * @property Year $year
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sclass extends Model
{

//     public function getRouteKeyName()
// {
//     return 'name';
// }



    static $rules = [
		'year_id' => 'required',
        'stage_id' => 'required',
        'name' => 'required|string',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['year_id','stage_id','name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stage()
    {
        return $this->hasOne('App\Models\Stage', 'id', 'stage_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function year()
    {
        return $this->hasOne('App\Models\Year', 'id', 'year_id');
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function attendances()
    {
        return $this->hasManyThrough(Attendance::class,Student::class);
    }
}
