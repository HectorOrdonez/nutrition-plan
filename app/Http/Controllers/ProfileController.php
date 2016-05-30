<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Requests;

class ProfileController extends Controller
{
    /**
     * Shows the current user profile
     */
    public function show()
    {
        $user = Auth::user();

        return view('profile/show', compact('user'));
    }
}
