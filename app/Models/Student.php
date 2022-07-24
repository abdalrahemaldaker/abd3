<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @property $id
 * @property $fname
 * @property $lname
 * @property $father
 * @property $phone
 * @property $mobile
 * @property $birthdate
 * @property $Note
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Student extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function sclasses(){
        return $this->belongsToMany(Teacher::class);
    }


    static $rules = [
		'fname' => 'required',
		'lname' => 'required',
		'father' => 'required',
		'phone' => 'required',
		'mobile' => 'required',
		'birthdate' => 'required',
		'note' => 'required',
        'email'     => 'required|email|unique:users',
        'password'  => 'required|confirmed',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fname','lname','father','phone','mobile','birthdate','Note'];


}
