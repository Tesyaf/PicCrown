<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Follow user
    public function store(Request $request, User $user)
    {
        $me = $request->user();

        if ($me->id === $user->id) {
            return back()->with('error', 'Kamu tidak bisa mengikuti diri sendiri.');
        }

        if (! $me->following()->where('followed_user_id', $user->id)->exists()) {
            $me->following()->attach($user->id);
        }

        return back()->with('success', 'Berhasil mengikuti '.$user->name.'.');
    }

    // Unfollow user
    public function destroy(Request $request, User $user)
    {
        $me = $request->user();

        $me->following()->detach($user->id);

        return back()->with('success', 'Berhenti mengikuti '.$user->name.'.');
    }
}
