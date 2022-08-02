<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
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
           'address' => $this->faker->address(),
            'note' => $this->faker->text(),
        ];
    }
}
