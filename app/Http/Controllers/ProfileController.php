<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit(User $user)
    {
        if(!auth()->user() || auth()->user()->id != $user->id)
        {
            abort(401);
        }
        
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:30|unique:users,name,' . $user->id,
            'email' => 'required|email|max:100|unique:users,email,' . $user->id,
            'file' => 'image',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if($request->file('file'))
        {
            $url = Storage::put('public/users', $request->file('file'));

            if($user->image)
            {
                Storage::delete($user->image->url);

                $user->image->update([
                    'url' => $url
                ]);
            } else
            {
                $user->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('profile.edit', $user)
                         ->with('update-profile-success', 'Profile was updated successfully');
    }
}
