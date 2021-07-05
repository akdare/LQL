
<!DOCTYPE html>
<head>
  <html lang="en">
  <title>Messagerie</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>
  html,body,h1,h2,h3,h4,h5 {font-family: "RobotoDraft", "Roboto", sans-serif}
  .w3-bar-block .w3-bar-item {padding: 16px}
  </style>
</head>

<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;" id="mySidebar">
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-large"><img src="{{asset('img/logoQl.jpeg')}}" style="width:60%;"></a>
  <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
  class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'">New Message <i class="w3-padding fa fa-pencil"></i></a>
  <a id="myBtn" onclick="myFunc('Demo2')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Inbox (3)<i class="fa fa-caret-down w3-margin-left"></i></a>
  <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-paper-plane w3-margin-right"></i>Sent (3)<i class="fa fa-caret-down w3-margin-left"></i></a>

  <div id="Demo1" class="w3-hide w3-animate-left">
    @foreach($messages as $message)
      @if($message->expediteur_id==Auth::user()->id)
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail({{$message->id}});w3_close();" id="firstTab">
        <div class="w3-container">
          <img class="w3-round w3-margin-right" src="/w3images/avatar3.png" style="width:15%;"><span class="w3-opacity w3-large">{{$message->expediteur()->first()->toString()}}</span>
          <h6>Objet : {{$message->sujet}}</h6>
          <form action="{{route('messages.destroy',$message)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <i class="fa fa-trash w3-margin-right">
                                                        <button class="btn btn-primary add-to-cart" data-button-action="add-to-cart"  title="Supprimer">						
                                                        Delete
                                                        </button>
                                                        </i>
           </form>
        </div>
      </a>
      @endif
    @endforeach
  </div>
  <div id="Demo2" class="w3-hide w3-animate-left">
  @foreach($messages as $message)
     @if($message->destinataire_id==Auth::user()->id)
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail({{$message->id}});w3_close();" id="firstTab">
        <div class="w3-container">
          <img class="w3-round w3-margin-right" src="/w3images/avatar3.png" style="width:15%;"><span class="w3-opacity w3-large">{{$message->expediteur()->first()->toString()}}</span>
          <h6>Objet : {{$message->sujet}}</h6>
          <form action="{{route('messages.destroy',$message)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <i class="fa fa-trash w3-margin-right">
                                                        <button class="btn btn-primary add-to-cart" data-button-action="add-to-cart"  title="Supprimer">						
                                                        Delete
                                                        </button>
                                                        </i>
           </form>
        </div>
      </a>
      @endif
    @endforeach
  </div>

  <!--<a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Drafts</a>-->
  <!--<a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Trash</a>-->
</nav>

<!-- Modal that pops up when you click on "New Message" -->

<form action="{{route('messages.store')}}" method="POST" >
@csrf
<div id="id01" class="w3-modal" style="z-index:4">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-padding w3-grey">
       <span onclick="document.getElementById('id01').style.display='none'"
       class="w3-button w3-white w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
      <h2>Send Mail</h2>
    </div>
    <div class="w3-panel">
      <label>To</label>
      <input class="w3-input w3-border w3-margin-bottom" type="text" id="destinataire" name="destinataire">
      <label>Subject</label>
      <input class="w3-input w3-border w3-margin-bottom" type="text" id="sujet" name="sujet">
      <input class="w3-input w3-border w3-margin-bottom" style="height:150px" placeholder="What's on your mind?" id="contenu" name="contenu">
      <div class="w3-section">
        <a class="w3-button w3-grey" onclick="document.getElementById('id01').style.display='none'">Cancel &nbsp;<i class="fa fa-remove"></i></a>
        <a class="w3-button w3-light-grey w3-right" onclick="document.getElementById('id01').style.display='none'"><button type="submit">Send &nbsp;<i class="fa fa-paper-plane"></i>  </button></a>
      </div>    
    </div>
  </div>
</div>
</form>

<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->
<div class="w3-main" style="margin-left:320px;">
<i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
<a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil"></i></a>
@foreach($messages as $message)
     @if($message->expediteur_id==Auth::user()->id)
      <div id="{{$message->id}}" class="w3-container person">
        <br>
        <img class="w3-round  w3-animate-top" src="/w3images/avatar3.png" style="width:20%;">
        <h5 class="w3-opacity">Objet : {{$message->sujet}}</h5>
        <h4><i class="fa fa-clock-o"></i> To {{$message->expediteur()->first()->toString()}}, {{ $message->created_at->format('\l\e d/m/Y \à H:i:s') }} </h4>
      <!--  <a class="w3-button w3-light-grey" href="#" >Reply<i class="w3-margin-left fa fa-mail-reply"></i></a>-->
      <!--  <a class="w3-button w3-light-grey" href="#">Forward<i class="w3-margin-left fa fa-arrow-right"></i></a>-->
        <hr>
        <p>{{$message->contenu}}</p>
   
                                
                          
      </div>
      @endif
@endforeach

@foreach($messages as $message)
     @if($message->destinataire_id==Auth::user()->id)
      <div id="{{$message->id}}" class="w3-container person">
        <br>
        <img class="w3-round  w3-animate-top" src="/w3images/avatar3.png" style="width:20%;">
        <h5 class="w3-opacity">Objet : {{$message->sujet}}</h5>
        <h4><i class="fa fa-clock-o"></i> From {{$message->expediteur()->first()->toString()}}, {{ $message->created_at->format('\l\e d/m/Y \à H:i:s') }} </h4>
      <!--  <a class="w3-button w3-light-grey" href="#">Reply<i class="w3-margin-left fa fa-mail-reply"></i></a> -->
      <!--<a class="w3-button w3-light-grey" href="#">Forward<i class="w3-margin-left fa fa-arrow-right"></i></a>-->
        <hr>
        <p>{{$message->contenu}}</p>
        <form action="{{route('reponses.store',$message)}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <div class="text-center">
                                            <label for="reponse">Reponse </label>
                                        </div>
                                        <textarea class="form-control text-justify" name="reponse" id="reponse" cols="100" rows="10"></textarea>
                                    </div>
                                    
                                    <a class="w3-button w3-light-grey w3-left" onclick="document.getElementById('id01').style.display='none'"><button type="submit">Send &nbsp;<i class="fa fa-paper-plane"></i>  </button></a>


                                </form>
      </div>
      @endif
@endforeach
     
</div>

<script>
var openInbox = document.getElementById("myBtn");
openInbox.click();

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show"; 
   // x.previousElementSibling.className += " w3-red";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-red", "");
  }
}


function openMail(personName) {
  var i;
  var x = document.getElementsByClassName("person");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x = document.getElementsByClassName("test");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" w3-light-grey", "");
  }
  document.getElementById(personName).style.display = "block";
  event.currentTarget.className += " w3-light-grey";
}
</script>

<script>
var openTab = document.getElementById("firstTab");
openTab.click();
</script>
<!--
<script>
    $(document).ready(function(){

fetch_customer_data();

function fetch_customer_data(query = '')
{
 $.ajax({
  url:"{{ route('live_search.action') }}",
  method:'GET',
  data:{query:query},
  dataType:'json',
  success:function(data)
  {
   $('tbody').html(data.table_data);
   $('#total_records').text(data.total_data);
  }
 })
}

$(document).on('change', '#destinataire', function(){
  alert('change')
 var query = $(this).val();
 fetch_customer_data(query);
});
});
</script>
-->
</body>
</html> 