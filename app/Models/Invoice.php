<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
    	'client_id',
    	'invoice_date',
    	'due_date',
    	'paid'
    ];

    /**
     * Relationship to client
     * @return [type] [description]
     */
    public function client() {
    	return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Define relationship to invoice items
     * @return [type] [description]
     */
    public function items() {
        return $this->hasMany(Item::class, 'invoice_id');
    }

    /**
     * Get invoice total
     * @return [type] [description]
     */
    public function total() {
        $totals = new \stdClass();
        
        $items = $this->items;

        $settings = new Setting;
        $settings = $settings->fetch();

        $total = 0;

        foreach($items as $item) {
            $total += $item->qty * $item->unit_price;
        }

        $vat = ($settings->tax_rate / 100) * $total;

        $totals->gross = $total;
        $totals->vat = $vat;
        $totals->net = $total + $vat;

        return $totals;
    }
}