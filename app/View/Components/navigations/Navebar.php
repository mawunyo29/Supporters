<?php

namespace App\View\Components\navigations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Navebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public  $user;
    public $search ="";
    public $users;
    public function __construct()
    {
        $this->user = Auth::user();
    }
   

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
       $this->search = request()->query('search');
       $this->users = User::search($this->search);
        return view('components.navigations.navebar');
    }
}
