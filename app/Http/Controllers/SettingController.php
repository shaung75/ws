<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
	/**
	 * Show the settings form
	 * @return [type] [description]
	 */
  public function show() {
 		$settings = Setting::get()->first();
 		
 		return view('settings.show', [
 			'settings' => $settings
 		]);
  }

  /**
   * Update settings
   * @param  Request $request  [description]
   * @param  Setting $settings [description]
   * @return [type]            [description]
   */
  public function update(Request $request, Setting $settings) {
  	$settings = $settings->fetch();

  	$formFields = $request->validate([
      'business_name' => 'required', 
    	'business_address1' => 'required', 
    	'business_town' => 'required',
    	'business_county' => 'required',
    	'business_postcode' => 'required',
    	'business_email' => ['required', 'email'],
    	'business_telephone' => 'required',
    	'tax_rate' => 'required',
    ]);

    $formFields['business_address2'] = $request->business_address2;
    $formFields['invoice_prefix'] = $request->invoice_prefix;
    $formFields['invoice_suffix'] = $request->invoice_suffix;
    $formFields['invoice_footer'] = $request->invoice_footer;
    $formFields['invoice_payment_details'] = $request->invoice_payment_details;

    $settings->update($formFields);

    return redirect('/settings')->with('message', 'Updated successfully');
  }
}
