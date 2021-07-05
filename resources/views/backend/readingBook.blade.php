
@extends('template2')

@section('content')
     
<div class="container">
    <div id="columns_inner"><div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
<div id="aeileftbanner">

</div></div>
          
<div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-9">

<section id="products">     
      <div id="js-product-list-top" class="row products-selection">
        <div class="col-md-5 hidden-sm-down total-products">
            <span class="show_grid active"></span>
            <span class="show_list"></span>
            <p></p>
        </div>
        <div class="col-md-7">
        <div class="sort-by-row">

      <span class="col-sm-3 col-md-3 hidden-sm-down sort-by"></span>
      <span class="col-sm-3 col-md-3 hidden-sm-down sort-by"></span>
        <div class="col-sm-12 col-xs-12 col-md-9 products-sort-order dropdown">
        {{$readings->links()}}
        </div>
      </div>
    
      </div></div>
    -->
<div id="js-product-list">
<div class="products row">
      
@foreach($readings as $reading)               
<article class="product-miniature js-product-miniature" data-id-product="112" data-id-product-attribute="0" itemscope="" itemtype="http://schema.org/Product">
<div class="thumbnail-container has_shopby reviews-loaded">
    <div class="product-image-block">
                <a href="">
                    <span class="main_image">
                        <img src="{{$reading->book()->first()->image()}}" alt="" />
                    </span>
            
                </a>
            
    </div>
     
<div class="product-description">
<h2 class="h3 product-title" itemprop="name"><a href="">{{$reading->book()->first()->toString()}}</a></h2>
        
<div class="product-list-reviews">

<div class="comments-nb"></div>
</div>
<div class="product_list_shop_by">&nbsp;</div>            
    <div class="product-add">
                      
    </div>
  
<a href='{{url("/like/{$reading->id}")}}'>{{($likeCtr ?? '')}} <i class="fa fa-thumbs-up"></i> </a>
<a href='{{url("/dislike/{$reading->id}")}}'>{{($dislikeCtr ?? '')}} <i class="fa fa-thumbs-down"></i></a>   
<form action="{{route('reading.delete',$reading)}}" method="POST" class="add-to-cart-or-refresh">   
                          @csrf
                          @method('delete')
      <span class="w3-right w3-opacity"><button style="border: none;" type="submit" title="Supprimer le livre" > <i class="fa fa-trash"></i> </button></span>
</form>
<button style="border: none;" type="button"  onclick="document.getElementById('post_{{$reading->id}}').style.display='block'">&nbsp; commentaire (s) <i class="fa fa-comment"></i></button>


 
<div id="post_{{$reading->id}}" class="w3-modal w3-animate-opacity">
<div class="w3-modal-content w3-card-4">
        <span onclick="document.getElementById('post_{{$reading->id}}').style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>

              <div class="w3-container">
              <div class="container mt-5 mb-5">
              <div class="d-flex justify-content-center row">
                <div class="d-flex flex-column col-md-8">
                    <div class="coment-bottom bg-white p-2 px-4">
                        <form action="{{route('comments.store',$reading)}}" method="POST">
                          @csrf
                          @if( Auth::user()->getMedia('avatars')->first() !=null)
                             <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="{{ Auth::user()->getMedia('avatars')->first()->getUrl('thumb') }}" width="40"><textarea class="form-control" name="comment" id="comment"></textarea></div>
                            <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">commenter</button></div>
                          @else
                          <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="" width="40"><textarea class="form-control ml-1 shadow-none textarea" name="comment" id="comment"></textarea></div>
                            <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">commenter</button></div>
                          @endif
                        </form> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

                     
      
</div>


</article>
@endforeach
 
@stop

