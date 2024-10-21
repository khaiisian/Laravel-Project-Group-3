<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HouseOwner;
class HouseOwnerSeeder extends Seeder
{
    protected $model = HouseOwner::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HouseOwner::factory(10)->create();
    }
}
