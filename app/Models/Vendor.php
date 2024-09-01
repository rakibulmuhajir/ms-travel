<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function visas()
    {
        return $this->hasMany(Visa::class);
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
