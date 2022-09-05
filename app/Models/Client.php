<?php

namespace App\Models;

use App\Models\Appointment;
use App\Models\Piano;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
		protected $fillable = [
            'business_name',
			'first_name', 
			'surname', 
			'address1', 
			'address2', 
			'town', 
			'county', 
			'postcode', 
			'telephone',
            'telephone_secondary', 
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

    /**
     * Relationship to appointments
     * @return [type] [description]
     */
    public function appointments() {
        return $this->hasMany(Appointment::class, 'client_id');
    }

    public function service_status() {
    	$status = new \stdClass();
    	$pianos = $this->pianos()->get();

    	$ok = 0;
    	$overdue = 0;
    	$due_soon = 0;

    	foreach ($pianos as $piano) {
    		if($piano->service_status()->warning == 'success') $ok++;
    		if($piano->service_status()->warning == 'warning') $due_soon++;
    		if($piano->service_status()->warning == 'danger') $overdue++;
    	}

    	if($overdue > 0) {
    		$status->status = 'Overdue';
    		$status->warning = 'danger';
    		return $status;
    	}
    	
    	if($due_soon > 0) {
    		$status->status = 'OK';
    		$status->warning = 'warning';
    		return $status;
    	}
    	
    	if($ok > 0) {
    		$status->status = 'OK';
    		$status->warning = 'success';
    		return $status;
    	}

    	$status->status = '';
    	$status->warning = '';

    	return $status;
    }
}
