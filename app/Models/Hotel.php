<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'check_in', 'check_out', 'nights', 'price', 'cost', 'vendor_id'];

    protected $dates = ['check_in', 'check_out'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}
