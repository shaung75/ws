<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
	/**
	 * Show the accounts edit form
	 * @param  Account $account [description]
	 * @return [type]           [description]
	 */
  public function edit(Account $account) {
  	return view('accounts.edit', [
      'account' => $account,
    ]);
  }

  public function update(Request $request, Account $account) {
  	$formFields = $request->validate([
      'account_name' => 'required',
      'tax_rate' => 'numeric',
      'invoice_start_from' => 'required'
    ]);

    $formFields['invoice_prefix'] = $request->invoice_prefix;
    $formFields['invoice_suffix'] = $request->invoice_suffix;
    $formFields['payment_details'] = $request->payment_details;
    $formFields['invoice_footer'] = $request->invoice_footer;

    $account->update($formFields);

    return redirect('/settings')->with('message', 'Account updated successfully');
  }
}
