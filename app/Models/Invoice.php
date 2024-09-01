<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'invoice_number', 'invoice_date', 'due_date', 'total_amount', 'status'];

    protected $dates = ['invoice_date', 'due_date'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}