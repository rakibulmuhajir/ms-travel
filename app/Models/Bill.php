<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_id', 'bill_number', 'bill_date', 'due_date', 'total_amount', 'status'];

    protected $dates = ['bill_date', 'due_date'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}