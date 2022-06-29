<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
    	'business_name', 
    	'business_address1', 
    	'business_address2',
    	'business_town',
    	'business_county',
    	'business_postcode',
    	'business_email',
    	'business_telephone',
    	'tax_rate',
    	'invoice_prefix',
    	'invoice_suffix'
    ];

    public function fetch() {
    	return $this->get()->first();
    }
}
