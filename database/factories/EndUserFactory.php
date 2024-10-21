<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EndUser;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EndUser>
 */
class EndUserFactory extends Factory
{
    protected $model = EndUser::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phNo' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'user_id' => User::factory(), // Create a user for the end user
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
