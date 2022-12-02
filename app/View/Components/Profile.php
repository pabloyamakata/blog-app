<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class Profile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = User::find(auth()->user()->id);
        $roleCount = $user->getRoleNames()->count();
        $roles = 'None';

        if($roleCount == 1)
        {
            $roles = $user->getRoleNames()[0];
        } elseif($roleCount > 1)
        {
            $roles = $user->getRoleNames()->implode(', ');
        }

        return view('components.profile', compact('user', 'roles'));
    }
}
