@extends('template')

@section('content')

<div>

    <!-- Middle Column -->
    
  <div class="w3-col m7">
      
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
          <form action="{{route('postTexts.store')}}" method="POST">
            @csrf
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Publier un post</h6>
              <textarea  name="post" id="post" class="form-control"></textarea>
              <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> &nbsp;Post</button> 
            </div>
          </form>
          </div>   
        </div>   
      </div>

      @foreach($posts as $post) 
      @if($post->thumbnail!=NULL)
     
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
      @if(Auth::user()->id==$post->user_id)
      <form action="{{route('post.delete',$post)}}" method="POST" class="add-to-cart-or-refresh">   
                          @csrf
                          @method('delete')
      <span class="w3-right w3-opacity"><button style="border: none;" type="submit" title="Supprimer le post"> <i class="fa fa-trash"></i> </button></span>
      </form> 
      @else
      <form action="{{route('post.delete',$post)}}" method="POST" class="add-to-cart-or-refresh">   
                          @csrf
                          @method('delete')
      <span class="w3-right w3-opacity"><button style="border: none;" type="submit" title="Supprimer le post" hidden> <i class="fa fa-trash"></i> </button></span>
      </form> 
      @endif

        <img src="{{asset('img/avatar3.jpeg')}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px; height:70px">
        <span class="w3-right w3-opacity">{{$post->created_at->diffForHumans()}}</span>
        <h4>{{$post->user()->first()->toString()}} a lu <mark>{{$post->title}}</mark></h4><br>
        <hr class="w3-clear">
      <!--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="{{$post->thumbnail}}" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>

            <!--
            <div class="w3-half">
              <img src="{{$post->thumbnail}}" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
          -->
      
        </div>
        <form action="{{route('like',$post->id)}}" method="POST">
          @csrf
          
          <span>{{($post->likes->count())}}  <button type="submit" style="border: none;"><i class="fa fa-thumbs-up"></i> </button></span>
          
        </form>
        <form action="{{route('dislike',$post->id)}}" method="POST">
          @csrf
          
          <span>{{($post->dislikes->count())}}  <button type="submit" style="border: none;"><i class="fa fa-thumbs-down"></i> </button></span>
          
        </form>
       <!-- <textarea class="w3-button w3-theme-d1 w3-margin-bottom" cols="1" rows="1" disabled> </textarea>-->

        <a type="button" onclick="document.getElementById('post_{{$post->id}}').style.display='block'"  wire:click="('comments', 'updateComments','post')">&nbsp;{{$post->comments->count()}} commentaire (s) <i class="fa fa-comment"></i></a>
        <div id="post_{{$post->id}}" class="w3-modal w3-animate-opacity">
        @else
        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
          @if(Auth::user()->id==$post->user_id)
            <form action="{{route('post.delete',$post)}}" method="POST" class="add-to-cart-or-refresh">   
                                @csrf
                                @method('delete')
            <span class="w3-right w3-opacity"><button style="border: none;" type="submit" title="Supprimer le post"> <i class="fa fa-trash"></i> </button></span>
            </form> 
            @else
            <form action="{{route('post.delete',$post)}}" method="POST" class="add-to-cart-or-refresh">   
                                @csrf
                                @method('delete')
            <span class="w3-right w3-opacity"><button style="border: none;" type="submit" title="Supprimer le post" hidden> <i class="fa fa-trash"></i> </button></span>
            </form> 
            @endif
        <img src="{{asset('img/avatar3.jpeg')}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px; height:70px">
        <span class="w3-right w3-opacity">{{$post->created_at->diffForHumans()}}</span>
        <h4>{{$post->user()->first()->toString()}}</h4><br> 
        <hr class="w3-clear">
      <!--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
          <div class="w3-row-padding" style="margin:0 -16px">
            <h4>{{$post->title}}</h4><br>

            <!--
            <div class="w3-half">
              <img src="{{$post->thumbnail}}" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
          -->
      
        </div>
    
    
        <form action="{{route('like',$post->id)}}" method="POST">
          @csrf
          
          <span>{{($post->likes->count())}}  <button type="submit" style="border: none;"><i class="fa fa-thumbs-up"></i> </button></span>
          
        </form>
        <form action="{{route('dislike',$post->id)}}" method="POST">
          @csrf
          
          <span>{{($post->dislikes->count())}}  <button type="submit" style="border: none;"><i class="fa fa-thumbs-down"></i> </button></span>
          
        </form>

       <!-- <textarea class="w3-button w3-theme-d1 w3-margin-bottom" cols="1" rows="1" disabled> </textarea>-->
       <!--<button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" ><i class="fa fa-thumbs-up"></i>&nbsp; 12 like (s)</button>-->

        <a type="button" onclick="document.getElementById('post_{{$post->id}}').style.display='block'"  wire:click="('comments', 'updateComments','post')">&nbsp;{{$post->comments->count()}} commentaire (s) <i class="fa fa-comment"></i></a>
        <div id="post_{{$post->id}}" class="w3-modal w3-animate-opacity">
          
        @endif

        <div class="w3-modal-content w3-card-4">
                <span onclick="document.getElementById('post_{{$post->id}}').style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>

                      <div class="w3-container">
                      <div class="container mt-5 mb-5">
                      <div class="d-flex justify-content-center row">
                        <div class="d-flex flex-column col-md-8">
                            <div class="coment-bottom bg-white p-2 px-4">
                                <form action="{{route('comments.store',$post->id)}}" method="POST">
                                  @csrf
                                  @if( Auth::user()->getMedia('avatars')->first() !=null)
                                     <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="{{ Auth::user()->getMedia('avatars')->first()->getUrl('thumb') }}" width="40"><textarea class="form-control" name="comment" id="comment"></textarea></div>
                                    <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">commenter</button></div>
                                  @else
                                  <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="" width="40"><textarea class="form-control ml-1 shadow-none textarea" name="comment" id="comment"></textarea></div>
                                    <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">commenter</button></div>
                                  @endif
                                </form> 
                                @foreach($post->comments as $comment)
                               
                                  <div class="commented-section mt-2">
                                          <div class="d-flex flex-row align-items-center commented-user">
                                              <h5 class="mr-2">{{$comment->user()->first()->toString()}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">{{ $comment->created_at->format('\l\e d/m/Y \à H:i') }}</span>
                                          </div>
                                    @if(Auth::user()->id==$comment->user_id)
                                    <form action="{{route('comments.delete',$comment)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                          <div class="comment-text-sm"><span>{{$comment->comment}}</span> <button style="border: none;" type="submit"> <i class="fa fa-trash"></i> </button></div>
                                    </form>
                                    @endif
                                          <!--
                                          <div class="reply-section">
                                              <div class="d-flex flex-row align-items-center voting-icons"><button class="fa fa-sort-down fa-2x mb-3 hit-voting" type="submit"></button><span class="ml-2">10</span><span class="dot ml-2"></span>
                                                  <h6 class="ml-2 mt-1">Reply</h6>
                                              </div>
                                          </div>
                                          -->
                                      </div> 
                        
                            
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  
      </div>
      

      @endforeach
</div>

@stop

