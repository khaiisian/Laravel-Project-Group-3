<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(HouseOwnerSeeder::class);
        $this->call(EndUserSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(TownshipSeeder::class);
        $this->call(PropertyTypeSeeder::class);
        $this->call(SelectionTypeSeeder::class);
        $this->call(UserPostSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call([
            PropertySeeder::class,
            PropertyImageSeeder::class, // Add this if you want extra images
        ]);
    }
}
