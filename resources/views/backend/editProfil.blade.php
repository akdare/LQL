<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>edit profil</title>
    <link rel="stylesheet" href="{{asset('css/editProfil.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Paramètres du compte</h4>
    <form method="POST" action="{{route('profil.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex align-items-start py-3 border-bottom"> <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="img" alt="">
            <div class="pl-sm-4 pl-2" id="img-section"> <b>Photo de profil</b>
                <p><input type="file" class="form-control-file" id="photo_profil" name="photo_profil"></p>
                <button class="btn button border" type="submit"><b>Upload </b></button>
            </div>
        </div>
    </form>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6"> <label for="name">Nom </label> <input type="text" class="bg-light form-control"> </div>
            <div class="col-md-6 pt-md-0 pt-3"> <label for="naissance">Date de naissance </label> <input type="date" class="bg-light form-control"> </div>

        </div>
        <div class="row py-2">
            <div class="col-md-6"> <label for="country">Country</label> <select name="country" id="country" class="bg-light">
                    <option value="india" selected>India</option>
                    <option value="usa">USA</option>
                    <option value="uk">UK</option>
                    <option value="uae">UAE</option>
                </select> 
            </div>
            <div class="col-md-6"> <label for="ville"> Ville </label> <input type="text" class="bg-light form-control"> </div>

        </div>
        <div class="py-3 pb-4 border-bottom"> <button class="btn btn-primary mr-3">Save Changes</button> <button class="btn border button">Cancel</button> </div>
   
    </div>
</div>
</body>
</html>




