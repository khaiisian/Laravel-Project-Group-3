<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SelectionType;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SelectionType>
 */
class SelectionTypeFactory extends Factory
{
    protected $model = SelectionType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(), // Generate unique selection type names
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
