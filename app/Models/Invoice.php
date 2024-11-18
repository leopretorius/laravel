<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory; // Ensure this trait is included

    protected $fillable = [
        'invoice_number',
        'user_id',
        'total_amount',
        'status',
    ];
}
