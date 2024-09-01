<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'amount', 'type', 'description', 'transaction_date'];

    protected $dates = ['transaction_date'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function transactionable()
    {
        return $this->morphTo();
    }
}