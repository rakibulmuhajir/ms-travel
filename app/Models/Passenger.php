<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'passport_number',
        'expiry_date',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
