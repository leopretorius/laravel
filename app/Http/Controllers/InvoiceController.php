<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function index()
    {
        // Return all invoices
        return response()->json(Invoice::with('user')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::create([
            'invoice_number' => Str::random(10),
            'user_id' => $validated['user_id'],
            'total_amount' => $validated['total_amount'],
            'status' => 'pending',
        ]);

        return response()->json($invoice, 201);
    }

    public function show($id)
    {
        $invoice = Invoice::with('user')->find($id);

        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }

        return response()->json($invoice);
    }
}
