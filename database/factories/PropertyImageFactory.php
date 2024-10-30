<?php

namespace Database\Factories;

use App\Models\PropertyImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyImageFactory extends Factory
{
    protected $model = PropertyImage::class;

    public function definition(): array
    {
        return [
            'property_id' => 1, // Make sure to assign existing property IDs in seeder
            'image_path' => 'images/' . $this->faker->unique()->word . '.jpg',
        ];
    }
}
