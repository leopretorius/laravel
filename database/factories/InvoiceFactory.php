<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'invoice_number' => Str::random(10),
            'user_id' => User::factory(), // Creates a related user automatically
            'total_amount' => $this->faker->randomFloat(2, 10, 5000), // Amount between 10 and 5000
            'status' => $this->faker->randomElement(['pending', 'paid', 'canceled']),
        ];
    }
}
