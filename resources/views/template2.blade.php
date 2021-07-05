
<!DOCTYPE html>
<html>
<title>Le Quartier Littéraire</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{asset('css/couleur_actu.css')}}" type="text/css" media="all">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{asset('css/css1.css')}}" rel="stylesheet">
<link href="{{asset('css/css2.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/theme.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/front.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/productcomments.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/home.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/report.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/mapbox-gl.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/parcel-point.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/jquery.ui.theme.min.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/jquery.growl.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/mapbox-gl.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/parcel-point.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/aeislider.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/homeslider.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/aeisearch.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/slick.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/colorbox.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css" media="all">
  <link rel="stylesheet" href="{{asset('css/comment1.css')}}">
  @livewireStyles
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
form {display: inline;}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="{{route('post.index')}}" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="{{route('messages.index')}}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
    
  </div>
 <a class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" style="margin-left: 100px;" href="{{route('deconnexion')}} ">Déconnexion <i class="fa fa-sign-out"></i></a>
    
 </div>
 
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">  
  
  <!-- The Grid -->
  <div class="w3-row">
  
    <!-- Left Column -->
    <div class="w3-col m3">
    
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">{{Auth::user()->name}}</h4>
         @if( Auth::user()->getMedia('avatars')->first() !=null)
         <p class="w3-center"><img src="{{ Auth::user()->getMedia('avatars')->first()->getUrl('thumb') }}" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         @endif
         <hr>
         <!--
         <a href="{{route('profil.index')}}" ><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>  Profil</a>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Rennes, France</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> 11 Mai 1997</p>
         -->
        </div>
        
      </div>
      
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button  class="w3-button w3-block w3-theme-l1 w3-left-align"><img src="https://img.icons8.com/metro/20/000000/home.png"/><a href="{{route('post.index')}}">Home</a></button>
          <button  class="w3-button w3-block w3-theme-l1 w3-left-align" ><img src="https://img.icons8.com/ios-filled/20/000000/book-shelf.png"/><a href="{{route('home')}}">Bibliothèque </a> </button>
          <button  class="w3-button w3-block w3-theme-l1 w3-left-align"><img src="https://img.icons8.com/android/20/000000/gift.png"/> <a href="{{route('wish.index')}}">Wish-List </a> </button>
          <button  class="w3-button w3-block w3-theme-l1 w3-left-align"><img src="https://img.icons8.com/metro/20/000000/book-stack.png"/> <a href="{{route('to_read.index')}}">Pile à Lire</a></button>
          <button  class="w3-button w3-block w3-theme-l1 w3-left-align"><img src="https://img.icons8.com/metro/20/000000/book.png"/><a href="{{route('chronique.index')}}">Chronique</a></button>
        </div>      
      </div>
      <br>
      
      
      <!-- Interests 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br> -->
      <!-- Alert Box -->

      <!--
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
     -->
    <!-- End Left Column -->
   
    </div>
    
      @if(session()->has('message'))
      <center><p class="alert alert-success">  {{session()->get('message')}} </p></center>
      @endif
      @if(session()->has('suppression'))
      <center><p class="alert alert-danger">{{session()->get('suppression')}}</p> </center>
      @endif

      @yield('content')
      @livewireScripts
  </body>


</html> 


 
  
