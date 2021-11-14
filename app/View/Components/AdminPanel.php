<?php

namespace App\View\Components;

use App\Models\Profile;
use App\Models\User;
use Illuminate\View\Component;

class AdminPanel extends Component
{
    public $user;
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
        return view('components.admin-panel');
    }
}
