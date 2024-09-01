<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'total_cost', 'total_price', 'status'];

    public function calculateTotalCost()
    {
        $totalCost = 0;
        foreach ($this->tickets as $ticket) {
            $totalCost += $ticket->cost;
        }
        foreach ($this->visas as $visa) {
            $totalCost += $visa->cost;
        }
        foreach ($this->hotels as $hotel) {
            $totalCost += $hotel->cost;
        }
        return $totalCost;
    }

    public function calculateTotalPrice()
    {
        // Assuming the total price is set by the user or calculated based on some logic
        return $this->total_price;
    }

    public function calculateProfit()
    {
        return $this->calculateTotalPrice() - $this->calculateTotalCost();
    }

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
