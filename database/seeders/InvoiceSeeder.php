<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        // Seed 50 invoices
        Invoice::factory()->count(50)->create();
    }
}
