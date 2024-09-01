<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'cost', 'vendor_id'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
