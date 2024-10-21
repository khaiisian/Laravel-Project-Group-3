<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PropertyType;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyType>
 */
class PropertyTypeFactory extends Factory
{
    protected $model = PropertyType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(), // Generate unique property type names
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
