<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expert>
 */
class ExpertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
     'name' => $this->faker->name(),
     'area_of_expertise' => $this->faker->name(),
     'years_of_experience' => $this->faker->year(),
     'email' => $this->faker->email(),
     'contact' => $this->faker->name(1,2,3,4,5,6,7,8,9,0),
     'profile_message' => $this->faker->sentence(25),
     ];
    }
}
