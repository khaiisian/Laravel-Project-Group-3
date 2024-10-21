<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Township;
use App\Models\Region;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Township>
 */
class TownshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Township::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->city(), // Generate unique township names
            'region_id' => Region::factory(), // Create a region for the township
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

