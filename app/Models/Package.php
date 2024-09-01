<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'total_cost', 'total_price', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }

    public function visas()
    {
        return $this->belongsToMany(Visa::class);
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }
}
