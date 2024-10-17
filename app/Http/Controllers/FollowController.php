<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    // app/Http/Controllers/FollowController.php

    public function follow(User $user)
    {
        auth()->user()->following()->attach($user->id);
        return back()->with('success', 'You are now following ' . $user->name);
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return back()->with('success', 'You are no longer following ' . $user->name);
    }

}
