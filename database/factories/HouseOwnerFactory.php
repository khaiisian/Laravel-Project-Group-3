<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HouseOwner;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HouseOwner>
 */
class HouseOwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => $this->faker->address(),
            'phNo' => $this->faker->phoneNumber(),
            'fbLink' => $this->faker->url(),
            'profile' => $this->faker->imageUrl(),
            'NRC' => $this->faker->unique()->numerify('NRC-######'),
            'NRCImage' => $this->faker->imageUrl(),
            'user_id' => User::factory(), // Create a user for the house owner
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
