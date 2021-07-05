
@extends('template2')

@section('content')
@if(session()->has('recherche'))
      <center><p class="alert alert-success">  {{session()->get('recherche')}} </p></center>
 @endif

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
              @include('backend/search')
        </div>
      </div>

      </div></div>
      
<div id="js-product-list">
<div class="products row">
      
@foreach($books as $book)               
<article class="product-miniature js-product-miniature" data-id-product="112" data-id-product-attribute="0" itemscope="" itemtype="http://schema.org/Product">
<div class="thumbnail-container has_shopby reviews-loaded">
    <div class="product-image-block">
                <a href="">
                    <span class="main_image">
                        <img src="{{$book->volumeInfo->imageLinks->thumbnail ?? ''}}" alt="" >
                    </span>
                   
                </a>
            
    </div>
     
<div class="product-description">
<h2 class="h3 product-title" itemprop="name"><a href="">{{$book->volumeInfo->title}}</a></h2>
        
<div class="product-list-reviews">

<div class="comments-nb"></div>
</div>


<div class="product-add">

                </div>
                <form action="{{route('books.ajout')}}" method="post" class="add-to-cart-or-refresh">
                            @csrf
                            <input value="{{$book->volumeInfo->title}}" name="title" id="title" hidden>
                            <input value="{{$book->volumeInfo->imageLinks->thumbnail ?? ''}}" id="thumbnail" name="thumbnail" hidden>

                            <button class="w3-button w3-block w3-theme-l1 " title="Ajouter à ma bibliothèque"><i class="fa fa-plus "> Ajouter à ma bibliothèque  </i></button>         
                        </form> 
   
</div>

</article>
@endforeach
 
@stop

