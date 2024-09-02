<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'passenger_id', 'invoice_id', 'bill_id',
        'total_cost', 'total_price', 'status',
        'has_visa', 'has_ticket', 'has_hotel'
    ];

    protected $casts = [
        'has_visa' => 'boolean',
        'has_ticket' => 'boolean',
        'has_hotel' => 'boolean',
    ];

    public function calculateTotalCost()
    {
        $totalCost = 0;
        if ($this->has_ticket) {
            $totalCost += $this->tickets->sum('cost');
        }
        if ($this->has_visa) {
            $totalCost += $this->visas->sum('cost');
        }
        if ($this->has_hotel) {
            $totalCost += $this->hotels->sum('cost');
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

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
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
