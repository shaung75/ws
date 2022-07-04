<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Show the account screen
     * @return [type] [description]
     */
    public function index() {
        return view('users.index');
    }

    /**
     * Update account details
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }
        
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("message", "Password changed successfully!");
    }

	// Show login form
    public function login() {
    	return view('users.login');
    }

    // Authenticate the user
    public function authenticate(Request $request) {
    	$formFields = $request->validate([
    		'email' => ['required', 'email'],
    		'password' => 'required'
    	]);

    	if(auth()->attempt($formFields)) {
    		$request->session()->regenerate();

    		return redirect('/')->with('success', 'You are now logged in!');
    	}

    	return back()->with('error', 'Invalid credentials');
    }

    // Log the user out
    public function logout(Request $request) {
    	auth()->logout();

    	$request->session()->invalidate();
    	$request->session()->regenerateToken();

    	return redirect('login')->with('success', 'You have been logged out');
    }

    // Password reset request form
    public function passwordRequest() {
    	return view('users.forgot-password');
    }

    // Send password reset link
    public function passwordEmail(Request $request) {
		$request->validate(['email' => 'required|email']);

		$status = Password::sendResetLink($request->only('email'));

		return $status === Password::RESET_LINK_SENT
			? back()->with(['status' => __($status)])
			: back()->withErrors(['email' => __($status)]);
    }

    // Password reset form
    public function passwordReset(Request $request) {
    	return view('users.reset-password', [
    		'token' => $request->token,
    		'email' => $request->email
    	]);
    }

    // Update the password
    public function passwordUpdate(Request $request) {
		$request->validate([
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:8|confirmed',
		]);

		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password)
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
			? redirect()->route('login')->with('message', __($status))
			: back()->withErrors(['email' => [__($status)]]);    	
    }
}
