<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
      'account_name',
			'tax_rate', 
			'invoice_prefix', 
			'invoice_suffix', 
			'payment_details', 
			'invoice_footer',
			'invoice_start_from'
		];
}
