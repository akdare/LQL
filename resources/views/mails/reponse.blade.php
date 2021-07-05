@extends("layouts.admin")

@section("content")
    <div class="container" style="height: 100%;">
        <div class="card bg-transparent border-0" style="height: 100%">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Messages</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Mails</a></li>
                                <li class="breadcrumb-item">Messages</li>
                                <li class="breadcrumb-item"></li>
                                <li class="breadcrumb-item active">Reponse</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <section class="row" style="height: 100%;">
                <x-letter-menu></x-letter-menu>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="card bg-light" style="height: 100%">
                        <div class="card-header">
                            <div class="card-title row">
                                <div class="col mb-2 mb-md-0">
                                    <h4>Message <span class="fas fa-envelope-open-text"></span></h4>
                                </div>
                                <div class="col mb-2 mb-md-0">
                                </div>
                            </div>
                            <div class="form-group">
                                        <textarea class="form-control text-justify" name="content" id="answer" cols="5" rows="10" readOnly>{{$message->contenu}}</textarea>
                                    </div>
                            <hr class="text-muted" style="border-top: 1px solid">
                            <div class="card-subtitle mb-1 row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-5 h5">Expéditeur: </div>
                                        <div class="col-lg-7 col-md-8 col-sm-7 text-muted">
                                            <p class="h6 mt-0 mb-0"></p>
                                            <p class="mt-0 mb-0"></p>
                                            <p class="mt-0 mb-0"></p>
                                            <p class="mt-0 mb-0"></p>
                                            {{$message->expediteur_id}}
                                         
                                        </div>
                                        <div class="col">
                                            <h6 class="text-muted">{{$message->created_at}}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col">
                                           <h5>Objet: {{$message->sujet}}</h5>
                                       </div>
                                        <div class="col text-right">
                                            <button type="button" class="btn btn-sm bg-transparent" data-toggle="collapse"
                                                    data-target="#letter-collapse" aria-expanded="false" aria-controls="#letter-collapse">
                                                <span class="fas fa-caret-down"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                           <div class="collapse" id="letter-collapse">
                               <div class="text-justify">
                                  
                               </div>
                               <div class="d-flex">
                                   <img src="" alt="" width="100%">
                                 
                               </div>
                           </div>

                            <div class="mt-3">
                                <form action="{{route('reponses.store',$message)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="text-center">
                                            <label class="h2 text-muted" for="reponse">Réponse <span class="fas fa-caret-down"></span></label>
                                        </div>
                                        <textarea class="form-control text-justify" name="reponse" id="reponse" cols="5" rows="10"></textarea>
                                    </div>
                                    
                                   
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary"><span class="fas fa-send"></span>Envoyer</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endsection


@push('scripts')
    <script async>
        (function () {
            $('textarea').summernote();
            @if($errors->any())
                Swal.fire(" @foreach($errors->all() as $error)\n" +
                "                                          \n" +
                "                                             {{$error}}\n" +
                "                                       \n" +
                "                                        @endforeach");
            @endif
            @if (Session::has('success'))
                Swal.fire('Succès', 'Reponse enregistrée avec succès !', 'success');
            @endif
        })()
    </script>
@endpush
