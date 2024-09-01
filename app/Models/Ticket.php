<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['pnr', 'airline', 'outbound', 'inbound', 'cost', 'price', 'vendor_id'];

    protected $dates = ['outbound', 'inbound'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
