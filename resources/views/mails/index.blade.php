@extends("layouts.admin")

@section("content")
    <div class="container" style="height: 100%;">
        <div class="card bg-transparent border-0" style="height: 100%">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Boîte de réception</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Mails</a></li>
                                <li class="breadcrumb-item">Réception</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <section class="row" style="height: 100%;">
                <x-letter-menu></x-letter-menu>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="card bg-light" style="height: 100%;">
                        <div class="card-header mb-0">
                            <div class="card-title row">
                                <div class="col mb-md-0">
                                    <h4>Mes mails <span class="fas fa-envelope-open-text"></span></h4>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body mt-0">
                            <div class="table-responsive">
                                <table class="table table-info table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                
                                        <th>
                                            Expéditeur
                                        </th>
                                        <th>
                                            Objet
                                        </th>
                                        <th>
                                           Réception
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $message)
                                        @if($message->destinataire_id==Auth::user()->id)
                                        <tr>
                                           
                                            <td>
                                                {{$message->destinataire_id}}
                                            <td>
                                            {{$message->sujet}}
                                            </td>
                                            <td>
                                                {{$message->created_at}}
                                            </td>
                                            <td>
                                                    <form action="{{route('messages.edit',$message)}}" method="POST">
                                                        @csrf
                    
                                                        <button class="btn btn-primary add-to-cart" data-button-action="add-to-cart"  title="Supprimer">						
                                                              Lire
                                                        </button>
                                                    </form>

                                                    <form action="{{route('messages.destroy',$message)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-primary add-to-cart" data-button-action="add-to-cart"  title="Supprimer">						
                                                              Supprimer
                                                        </button>
                                                    </form>
                                                </td>
                                            </td>
                                        @endif

                                     @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
