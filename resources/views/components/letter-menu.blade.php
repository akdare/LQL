<div class="col-lg-3 col-md-3">
    <div class="card bg-light mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h4 class="card-title">Menu</h4>
                </div>
                <div class="text-right">
                    <button type="button" class="btn bg-transparent" data-toggle="collapse"
                            data-target="#collapse" aria-expanded="false" aria-controls="#collapse">
                        <span class="fas fa-minus"></span>
                    </button>
                </div>
            </div>
        </div>
        <div id="collapse" class="card-body p-0 collapse show navbar-collapse">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                    <a href="{{route('messages.index')}}" class="nav-link">
                        <i class="fas fa-inbox"></i> Réçus
                       
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('reponses.index')}}" class="nav-link">
                        <i class="fas fa-envelope"></i> Envoyés
                    </a>
                </li>
               
            </ul>
        </div>
    </div>
</div>
