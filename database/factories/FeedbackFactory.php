<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Feedback;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    protected $model = Feedback::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(), // Generate a random title
            'about' => $this->faker->paragraph(), // Generate random feedback content
            'rate' => $this->faker->numberBetween(1, 5), // Generate a random rating
            'user_id' => User::factory(), // Generate or associate with a user
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
