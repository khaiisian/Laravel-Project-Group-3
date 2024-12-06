<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserPost;
use App\Models\EndUser;
use App\Models\Region;
use App\Models\Township;
use App\Models\SelectionType;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPost>
 */
class UserPostFactory extends Factory
{
    protected $model = UserPost::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'end_user_id' => EndUser::factory(), // Create an end user for each post
            'region_id' => Region::factory(), // Create a region for each post
            'township_id' => Township::factory(), // Create a township for each post
            'selection_type_id' => SelectionType::factory(), // Create a selection type for each post
            'content' => $this->faker->paragraph(), // Generate fake content
            'requirement' => $this->faker->sentence(), // Generate a requirement
            'status' => $this->faker->randomElement(['active', 'inactive']), // Generate a random status
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
