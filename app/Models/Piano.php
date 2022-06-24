<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piano extends Model
{
    use HasFactory;

    /**
     * Relationship to client
     * @return [type] [description]
     */
    public function client() {
    	return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Relationship to manufacturer
     * @return [type] [description]
     */
    public function manufacturer() {
    	return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
}
