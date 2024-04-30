<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowingController extends Controller
{
    public function __invoke(User $user, $following)
    {
        $follows = $following === 'following' ? $user->follows : $user->followers;

        if ($following !== 'following' && $following !== 'follower') {
            return redirect()->route('profile', $user->username);
        }

        return view('users.following', [
            'user' => $user,
            'follows' => $follows,
        ]);
    }
}
