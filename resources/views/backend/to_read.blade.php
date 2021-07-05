
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
        </div>
        <div class="col-md-7">
        <div class="sort-by-row">
        <span class="col-sm-3 col-md-3 hidden-sm-down sort-by"></span>
        <span class="col-sm-3 col-md-3 hidden-sm-down sort-by"></span>
        <div class="col-sm-12 col-xs-12 col-md-9 products-sort-order dropdown">
        {{$to_reads->links()}}
        </div>
      </div>
    
      </div></div>
    
<div id="js-product-list">
<div class="products row">
      
@foreach($to_reads as $to_read)               
<article class="product-miniature js-product-miniature" data-id-product="112" data-id-product-attribute="0" itemscope="" itemtype="http://schema.org/Product">
<div class="thumbnail-container has_shopby reviews-loaded">
    <div class="product-image-block">
                <a href="">
                    <span class="main_image">
                        <img src="{{$to_read->book()->first()->image()}}" alt="" />
                    </span>
            
                </a>
            
    </div>
     
<div class="product-description">
<h2 class="h3 product-title" itemprop="name"><a href="">{{$to_read->book()->first()->toString()}}</a></h2>
        
<div class="product-list-reviews">


<div class="comments-nb"></div>
</div>

<div class="product_list_shop_by">&nbsp;</div>            
    <div class="product-add">

                 <form action="{{route('readings.store')}}" method="POST" class="add-to-cart-or-refresh">
                        @csrf
                         <input value="{{$to_read->title}}" name="title" id="title" hidden >
                         <input value="{{$to_read->thumbnail}}" id="thumbnail" name="thumbnail" hidden>
                         <input value="{{$to_read->id}}" name="book_id" id="book_id" hidden >
                         <button class="w3-button w3-block w3-theme-l1 " title="En cours de lecture"><img src="https://img.icons8.com/ios-filled/20/000000/literature--v1.png"/></button></span>
                                      
                </form>

                <form action="{{route('post.store',$id ?? '')}}" method="POST" class="add-to-cart-or-refresh">
                                      @csrf
                                      <input value="{{$to_read->book()->first()->toString()}}" name="title" id="title" hidden >
                                      <input value="{{$to_read->book()->first()->image()}}" id="thumbnail" name="thumbnail" hidden>
                                      
                                     <button class="w3-button w3-block w3-theme-l1 " title="Lu"><img src="https://img.icons8.com/metro/20/000000/book.png"/></button></span>
                                      
                        </form>
                </div>
                <form action="{{route('to_read.destroy',$to_read)}}" method="POST" class="add-to-cart-or-refresh">
                          
                          @csrf
                          @method('delete')
                         <button class="w3-button w3-block w3-theme-l1 " title="Retirer de ma pile à lire"><i class="fa fa-remove fa-fw"></i> Retirer de ma pile à lire</button>
                          
                </form>
   
</div>

</article>
@endforeach
@stop

