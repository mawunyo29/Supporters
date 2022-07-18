<?php

namespace App\View\Components\navigations;

use App\Models\User;
use Illuminate\View\Component;

class Navebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user;
    public $search ="";
    public $users;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
   

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
       
       $this->users = User::where('name', 'like', '%' . $this->search . '%')->get();
        return view('components.navigations.navebar');
    }
}
