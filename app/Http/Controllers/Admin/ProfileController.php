<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Update name and email.
     */
    public function update(Request $request)
    {
        $request->validateWithBag('updateInfo', [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        $user = Auth::user();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();

        // Re-login to refresh the session with updated data
        Auth::login($user);

        return redirect()->route('admin.profile.edit')
                         ->with('success', 'Profile updated successfully.');
    }

    /**
     * Update password.
     */
    public function updatePassword(Request $request)
    {
        $request->validateWithBag('updatePassword', [
            'current_password' => ['required'],
            'password'         => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = Auth::user();

        if (! Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(
                ['current_password' => 'The current password is incorrect.'],
                'updatePassword'
            );
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Re-login to refresh the session with the new password hash
        Auth::login($user);

        return redirect()->route('admin.profile.edit')
                         ->with('success', 'Password updated successfully.');
    }
}