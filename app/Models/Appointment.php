<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Relationship to client
     * @return [type] [description]
     */
    public function client() {
    	return $this->belongsTo(Client::class, 'client_id');
    }
}
