<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Dislike;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       $posts = Post::orderBy('created_at','desc')->get(); 
       // $posts=Post::where('id','=',$post_id)->get();
      //  $likePost=Post::find($post_id);
       // $likeCtr=Like::where(['post_id'=>$likePost->id])->count();
        //return $likeCtr;
        //exit();
        
       return view('livewire/actuality',compact('posts'));

    }

    public function view($post_id)
    {   
      // $posts = Post::where('id','=',$post_id)->orderBy('created_at','desc')->get(); 

        $posts = Post::orderBy('created_at','desc')->get(); 
       // $posts=Post::where('id','=',$post_id)->get();
        $likePost=Post::find($post_id);
        $likeCtr=Like::where(['post_id'=>$likePost->id])->count();
        $dislikeCtr=Dislike::where(['post_id'=>$likePost->id])->count();

        //return $likeCtr;
        //exit();
        return view('livewire/actuality',['posts'=>$posts,'likeCtr'=>$likeCtr,'dislikeCtr'=>$dislikeCtr]);

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function store(Request $request)
    {
        
        $post=new Post();
        $post->title=request('title');
        $post->thumbnail=request('thumbnail');
        $post->user_id=Auth::user()->id;
     //  dd($post);
        $post->save();
        
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
            $post->delete();
            session()->flash('Post supprimé');
    
            return back();
        
    }
/*
    public function like($id){
        $loggedin_user=Auth::user()->id;
        $like_user=Like::where(['user_id'=>$loggedin_user,'post_id'=>$id])->first();
        if(empty($like_user->user_id)){
            $user_id=Auth::user()->id;
            $post_id=$id;
            $like=new Like();
            $like->user_id=$user_id;
            $like->post_id=$post_id;
            $like->save();
            return redirect("");
        }else{
            return redirect("/view/{$id}");
        }
       

    }*/
    
/*
    public function dislike($id){
        $loggedin_user=Auth::user()->id;
        $like_user=Dislike::where(['user_id'=>$loggedin_user,'post_id'=>$id])->first();
        if(empty($like_user->user_id)){
            $user_id=Auth::user()->id;
            $post_id=$id;
            $like=new Dislike();
            $like->user_id=$user_id;
            $like->post_id=$post_id;
            $like->save();
            return redirect("/view/{$id}");
        }else{
            return redirect("/view/{$id}");
        }
       

    }
*/

    public function like($id){
        $posts = Post::orderBy('created_at','desc')->get(); 
        // $posts=Post::where('id','=',$post_id)->get();
         $likePost=Post::find($id);
         $likeCtr=Like::where(['post_id'=>$likePost->id])->count();
        $loggedin_user=Auth::user()->id;
        $like_user=like::where(['user_id'=>$loggedin_user,'post_id'=>$id])->first();
        if(empty($like_user->user_id)){
            $user_id=Auth::user()->id;
            $post_id=$id;
            $like=new like();
            $like->user_id=$user_id;
            $like->post_id=$post_id;
            $like->save();
            

        }
        return redirect()->route('post.index');
       

    }

    public function dislike($id){
        $posts = Post::orderBy('created_at','desc')->get(); 
        // $posts=Post::where('id','=',$post_id)->get();
         $dislikePost=Post::find($id);
         $likeCtr=Dislike::where(['post_id'=>$dislikePost->id])->count();
        $loggedin_user=Auth::user()->id;
        $dislike_user=Dislike::where(['user_id'=>$loggedin_user,'post_id'=>$id])->first();
        if(empty($dislike_user->user_id)){
            $user_id=Auth::user()->id;
            $post_id=$id;
            $dislike=new Dislike();
            $dislike->user_id=$user_id;
            $dislike->post_id=$post_id;
            $dislike->save();
            

        }
        return redirect()->route('post.index');
       

    }
/*
      
    public function like($id){
        //dd($id);
        $user=Auth::user()->id;
        $post = Post::find($id);
        

        if(empty($post->likes)){
            $like = new Like([
                'user_id' => $user->id
            ]);
            $post->likes()->create($like);
        }
        return redirect()->route('post.index');

    }
*/

    
}
