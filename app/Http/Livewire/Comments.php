<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Comments extends Component
{
    public $comments;
    
    public function render()
    {
        return view('livewire.comments',compact(['comments'=>$this->comments]));
    }

    public function updateComments(Post $post){
        $this->comments=$post->comments;
    }


}
