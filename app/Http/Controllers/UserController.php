<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        Auth::login($user);

        return redirect()->route('home')->with('status', 'Registration successful! Welcome, ' . $user->name . '!');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginemail' => 'required|email',
            'loginpassword' => 'required'
        ]);

        if (Auth::attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect()->route('home'); 
        }

        return redirect()->route('auth')->withErrors(['loginerror' => 'Login failed, please check your credentials and try again.']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth');
    }

    public function updateProfile(Request $request) {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'min:8', 'max:200']
        ]);

        $user->name = $incomingFields['name'];
        $user->email = $incomingFields['email'];

        if (!empty($incomingFields['password'])) {
            $user->password = bcrypt($incomingFields['password']);
        }

        $user->save();
        return back()->with('status', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request) {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed']
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return back()->with('status', 'Password updated successfully.');
    }

    public function showAccountForm() {
        return view('account');
    }

    public function updateAccount(Request $request) {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'min:8', 'max:200']
        ]);

        $user->name = $incomingFields['name'];
        $user->email = $incomingFields['email'];

        if (!empty($incomingFields['password'])) {
            $user->password = bcrypt($incomingFields['password']);
        }

        $user->save();
        return back()->with('status', 'Account updated successfully.');
    }

    public function deactivateAccount(Request $request) {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->delete();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth')->with('status', 'Account deactivated successfully.');
    }

}
