<?php

namespace App\Models;

use App\Models\Account;
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
    	'paid',
        'hide_vat',
        'account_id'
    ];

    /**
     * Relationship to client
     * @return [type] [description]
     */
    public function client() {
    	return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Relationship to billing account
     * @return [type] [description]
     */
    public function account() {
        return $this->belongsTo(Account::class, 'account_id');
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

    /**
     * Returns payment status
     * @return [type] [description]
     */
    public function paymentStatus() {
        if($this->paid == 1) {
            $status = 'Paid';
        } else {
            $date = date('Y-m-d', time());

            $status = $date > $this->due_date ? 'Overdue' : 'Pending';
        }

        return $status;
    }

    /**
     * Return overdue invoices
     * @return [type] [description]
     */
    public static function overdue() {
        $date = date('Y-m-d', time());

        return static::all()
            ->where('due_date', '<', $date)
            ->where('paid', null);
    }
}
