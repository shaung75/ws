<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
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
