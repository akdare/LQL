@extends('template2')

@section('content')
                  

<div class="header-banner">

</div>      
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                    <button class="text-uppercase block_title" ><a href="{{route('books.index')}}">Ma bibliothèque</a></button>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
            <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="isbn">isbn</label>
                        <input type="text" class="form-control" id="isbn" name="isbn">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="presentation">Présentation</label>
                        <textarea type="text" class="form-control" name="presentation" id="presentation"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Déscription</label>
                        <textarea type="text" class="form-control" name="description" id="description"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="buying_price">Prix</label>
                        <input type="text" class="form-control" name="buying_price" id="buying_price"></input>
                    </div>
                </div>
               <div class="form-row">
                   <div class="form-group">
                       <label for="photo_principale">&nbsp;&nbsp;&nbsp;Photo </label>
                       <input type="file" class="form-control-file" id="photo_principale" name="photo_principale">
                   </div>
               </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="reading_state">Etat de lecture</label>
                        <select class="form-control form-control-lg" id="reading_state" name="reading_state">
                            <option>Lu</option>
                            <option>Souhaite lire</option>
                            <option>Possède mais pas encore lu</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="genre">Genre</label>
                        <select multiple class="form-control" id="genre" name="genre">
                            <option>Roman</option>
                            <option>Manga/BD</option>
                            <option>Société</option>
                            <option>Loisir</option>
                            <option>Scolaire</option>
                            <option>Amoché</option>
                            <option>Professionnel</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </main>
    </div>
</div>
@stop
