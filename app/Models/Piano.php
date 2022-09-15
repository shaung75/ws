<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Manufacturer;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piano extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id', 
        'client_id', 
        'model', 
        'colour', 
        'finish', 
        'serial_number', 
        'stock_number', 
        'year_of_manufacture',
        'ivory_keys',
        'notes'
    ];

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

    /**
     * Define relationship to services 
     * @return [type] [description]
     */
    public function services() {
        return $this->hasMany(Service::class, 'piano_id');
    }

    public function service_status() {
        $status = new \stdClass();
        $date = date('Y-m-d', time());

        $service = $this->services()->orderBy('due_date', 'desc')->first();

        if($service) {
            $datediff = (strtotime($service->due_date) - strtotime($date)) / (60 * 60 * 24);
            
            //$due_soon = ($datediff > 0 && $datediff <= 30) ? 'soon' : 'ok';
            
            $status->due = $service->due_date;

            if($service->due_date == $service->service_date) {
                $status->warning = 'success';
            } elseif($datediff > 0 && $datediff <= 30) {
                $status->warning = 'warning';
            } elseif ($date > $status->due) {
                $status->warning = 'danger';
            } else {
                $status->warning = 'success';
            }
            
            if($service->due_date == $service->service_date) {
                $status->status = 'N/A';
            } else {
                $status->status = $date > $status->due ? 'Overdue' : 'OK';
            }
            
        } else {
            $status->due = $date;
            $status->status = 'Overdue';
            $status->warning = 'danger';
        }

        return $status;
    }
}
