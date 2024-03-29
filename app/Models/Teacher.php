<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    use HasFactory;
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


    public function name()
    {
       return ucfirst($this->fname) . ' ' . ucfirst($this->lname);
    }
//     protected function name(): Attribute
// {
//     return Attribute::make(
//         get: fn ($value, $attributes) => new Address(
//             $attributes['address_line_one'],
//             $attributes['address_line_two'],
//         ),
//     );
// }


    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function courses()
    {
        return $this->hasMany(courses::class);
    }


}
