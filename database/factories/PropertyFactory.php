<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\HouseOwner;
use App\Models\Township;
use App\Models\SelectionType;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    protected $model = Property::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_type_id' => PropertyType::factory(), // Generate or use an existing PropertyType
            'house_owner_id' => HouseOwner::factory(), // Generate or use an existing HouseOwner
            'township_id' => Township::factory(), // Generate or use an existing Township
            'selection_type_id' => SelectionType::factory(), // Generate or use an existing SelectionType
            'content' => $this->faker->paragraph(), // Generate random content
            'address' => $this->faker->address(), // Generate a fake address
            'bedRoom' => $this->faker->numberBetween(1, 5), // Random bedroom count
            'bathRoom' => $this->faker->numberBetween(1, 3), // Random bathroom count
            'area' => $this->faker->numberBetween(500, 2000), // Random area
            'price' => $this->faker->randomFloat(2, 10000, 500000), // Random price between 10,000 and 500,000
            'status' => $this->faker->randomElement(['available', 'sold', 'rented']), // Random status
            'description' => $this->faker->sentence(), // Random description
            'room' => $this->faker->numberBetween(1, 10), // Random room count
            'images' => $this->faker->imageUrl(640, 480, 'house', true), // Generate a random image URL
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
