<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;

class UserPost extends Component
{
    public $user;
    public $posts;
    public $post;
    public $post_id;
    public $post_title;
    public $post_content;
    public $post_image;
    public $post_status;
    public $post_category;
    
    public function mount($user){
        $this->user = User::findOrFail($user) ;
       
    }
    public function render()
    {
        return view('livewire.back.user-post');
    }
}
