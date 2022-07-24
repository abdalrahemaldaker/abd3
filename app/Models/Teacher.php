<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 *
 * @property $id
 * @property $fname
 * @property $lname
 * @property $father
 * @property $address
 * @property $note
 * @property $phone
 * @property $mobile
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Teacher extends Model
{

    static $rules = [
		'fname' => 'required|string ',
		'lname' => 'required|string',
		'father' => 'required|string',
		'address' => 'required|string',
		'note' => 'required|string',
		'phone' => 'required|string',
		'mobile' => 'required|string',
        'email'     => 'required|email|unique:users',
        'password'  => 'required|confirmed',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fname','lname','father','address','note','phone','mobile'];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }



}
