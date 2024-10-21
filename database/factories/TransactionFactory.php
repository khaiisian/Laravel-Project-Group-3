<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaction;
use App\Models\EndUser;
use App\Models\Property;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'end_user_id' => EndUser::factory(), // Generate or use an existing EndUser
            'property_id' => Property::factory(), // Generate or use an existing Property
            'date' => $this->faker->date(), // Random date for the transaction
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
