<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Seeder;

class PropertyImageSeeder extends Seeder
{
    public function run(): void
    {
        // Retrieve all properties
        Property::all()->each(function ($property) {
            // Attach 3 images to each property
            PropertyImage::factory(3)->create(['property_id' => $property->id]);
        });
    }
}
