<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->word(),
            'lname' => $this->faker->word(),
            'father' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(7),
            'mobile' => $this->faker->phoneNumber(),
           'birthdate' => $this->faker->date(),
            'note' => $this->faker->text(),
        ];
    }
}
