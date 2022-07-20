<?php

namespace App\Http\Livewire\Searchs;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class SearchController extends Component
{
    public $search ="";
    public $users;
    public $is_searching = false;
    protected $queryString = ['search'];

    public function updatedSearch()
    {
        if (strlen($this->search) > 2) {
            
            $this->users = User::search($this->search);
        }
        
    }
    public function sendInvitation($user_id)
    {
        
       $this->emit('sendRequest', $user_id);
      
    }
    public function render()
    {
        return view('livewire.searchs.search-controller');
    }
}
