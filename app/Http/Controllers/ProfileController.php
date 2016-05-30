<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Auth;

use App\Http\Requests;

class ProfileController extends Controller
{
    const MESSAGE_UPDATED = 'Profile updated successfully';
    
    /**
     * Shows the current user profile
     */
    public function show()
    {
        $user = Auth::user();

        return view('profile/show', compact('user'));
    }

    /**
     * @param ProfileRequest $request
     */
    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->calories = $request->get('calories');
        $user->carbohydrates = $request->get('carbohydrates');
        $user->proteins = $request->get('proteins');
        $user->fats = $request->get('fats');
        $user->save();

        return redirect()
            ->route('profile.show')
            ->with('flash_message', self::MESSAGE_UPDATED);
        
    }
}
