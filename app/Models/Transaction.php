<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'type', 'transaction_date', 'description'];

    protected $dates = ['transaction_date'];

    public function transactionable()
    {
        return $this->morphTo();
    }
}