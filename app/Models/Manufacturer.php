<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    /**
     * Relationship to pianos
     * @return [type] [description]
     */
    public function pianos() {
    	return $this->hasMany(Piano::class, 'manufacturer_id');
    }
}
