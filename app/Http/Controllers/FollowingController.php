<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowingController extends Controller
{
    public function __invoke($identifier, $follow)
    {
        $user = User::where('hash', $identifier)->orWhere('username', $identifier)->firstOrFail();
        if ($follow == "following") {
            $follows = $user->follows()->paginate();
        } else {
            $follows = $user->followers()->paginate();
        }

        return view('follows.index', compact('follow', 'follows'));
    }
}
