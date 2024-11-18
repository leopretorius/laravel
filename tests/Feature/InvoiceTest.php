<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Invoice;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_invoice()
    {
        // Create a user to associate with the invoice
        $user = User::factory()->create();

        // Make a POST request to create an invoice
        $response = $this->postJson('/invoices', [
            'user_id' => $user->id,
            'total_amount' => 100.50,
        ]);

        // Assert the invoice was created successfully
        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'invoice_number',
                'user_id',
                'total_amount',
                'status',
                'created_at',
                'updated_at',
            ]);
    }

    public function test_can_retrieve_all_invoices()
    {
        // Seed some invoices
        Invoice::factory()->count(5)->create();

        // Make a GET request to retrieve invoices
        $response = $this->getJson('/invoices');

        // Assert the response has a 200 status and contains data
        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function test_can_retrieve_single_invoice()
    {
        // Create an invoice
        $invoice = Invoice::factory()->create();

        // Make a GET request to retrieve the invoice
        $response = $this->getJson("/invoices/{$invoice->id}");

        // Assert the invoice is returned successfully
        $response->assertStatus(200)
            ->assertJson([
                'id' => $invoice->id,
                'invoice_number' => $invoice->invoice_number,
            ]);
    }

    public function test_cannot_retrieve_nonexistent_invoice()
    {
        // Make a GET request for a non-existent invoice
        $response = $this->getJson('/invoices/99999');

        // Assert the response is a 404
        $response->assertStatus(404)
            ->assertJson([
                'message' => 'Invoice not found',
            ]);
    }
}
