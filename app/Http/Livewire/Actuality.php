<?php

namespace App\Http\Livewire;

use App\Models\Like;
use Livewire\Component;
use App\Models\Post;
use App\Models\PostText;
use Illuminate\Support\Facades\Auth;



class Actuality extends Component
{
    public $comments;
    public $posts;

    protected $listeners = ['likePost']; 

    public function mount(){
        $this->posts = Post::all();
    }

    public function render()
    {

        return view('livewire.actuality',compact(['posts' => $this->posts, 'comments'=>$this->comments]))->layout('template');
    }


    public function updateComments(Post $post){
        $this->comments=$post->comments;
    }
    
   
    public function likePost($id){
        dd($id);
        $user=Auth::user()->id;
        $post = Post::find($id);

        if(empty($post->likes)){
            $like = new Like([
                'user_id' => $user->id
            ]);
            $post->likes()->save($like);
        }
    }

    public function addTodo($id, $name)
{
    dd($id);
}
   
}
