<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileInformationController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'username' => ['required', 'min:3', 'alpha_num', 'unique:users,username,' . auth()->id()],
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'min:3', 'unique:users,email,' . auth()->id()],
        ]);

        auth()->user()->update($attr);

        return redirect()
            ->route('profile', auth()->user()->username)
            ->with('message', 'Your profile has been updated.');
    }
}
