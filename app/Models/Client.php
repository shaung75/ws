<?php

namespace App\Models;

use App\Models\Piano;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
		protected $fillable = [
			'first_name', 
			'surname', 
			'address1', 
			'address2', 
			'town', 
			'county', 
			'postcode', 
			'telephone', 
			'email', 
			'notes', 
			'lat', 
			'long'
		];
		
    use HasFactory;

    /**
     * Relationship to pianos
     * @return [type] [description]
     */
    public function pianos() {
    	return $this->hasMany(Piano::class, 'client_id');
    }

    /**
     * Relationship to invoices
     * @return [type] [description]
     */
    public function invoices() {
    	return $this->hasMany(Invoice::class, 'client_id');
    }
}
