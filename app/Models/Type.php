<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    /**
     * Define relationship to services 
     * @return [type] [description]
     */
    public function services() {
    	return $this->hasMany(Service::class, 'type_id');
    }
}
