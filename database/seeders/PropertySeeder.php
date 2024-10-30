<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyImage;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::factory(10)->create()->each(function ($property) {
            // Each property gets 3 images
            PropertyImage::factory(3)->create(['property_id' => $property->id]);
        });
    }
}
