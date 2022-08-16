<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'piano_id', 
        'type_id', 
        'service_date', 
        'due_date', 
        'technician', 
        'notes',
        'price'
    ];

    /**
     * Relationship to Service Type
     * @return [type] [description]
     */
    public function type() {
    	return $this->belongsTo(Type::class, 'type_id');
    }

    /**
     * Relationship to Piano
     * @return [type] [description]
     */
    public function piano() {
    	return $this->belongsTo(Piano::class, 'piano_id');
    }
}
