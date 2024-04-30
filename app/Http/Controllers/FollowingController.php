<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function index(User $user, $following)
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

    public function store(Request $request, User $user)
    {
        //Jika user sudah follow ? hapus follow : jika belum follow -> follow
        Auth::user()->hasFollow($user)
            ? Auth::user()->unfollow($user)
            : Auth::user()->follow($user);
        return back()->with('success', 'You are now following ' . $user->username);
    }
}
