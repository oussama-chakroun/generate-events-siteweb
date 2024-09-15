<x-app-layout>
  @if(Session::has('error'))
  <div class="alert alert-danger alert-dismissible" role="alert">
    {{ Session::get('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if(Session::has('warning'))
  <div class="alert alert-warning alert-dismissible" role="alert">
    {{ Session::get('warning')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <div class="card mb-4">
        <div class="card-body">
            
          <div class="row gy-3">
            <!-- Default Modal -->
            <div class="col-lg-4 col-md-6">
                <p >Liste des jours</p>
            </div>
            <!-- Vertically Centered Modal -->
            <div class="col-lg-4 col-md-6">
              
            </div>

            <!-- Slide from Top Modal -->
            <div class="col-lg-4 col-md-6 d-flex justify-content-end align-items-center">
              <div class="mt-3">
              <!-- Button trigger modal -->
              <a
              href="{{route('event.index')}}"
              class="btn btn-secondary"
            >retourner
              </a>
              <a
              href="{{route('day.create',$event_id)}}"
              class="btn btn-primary"
            >Ajouter un jour
              </a>
          </div>
            </div>
          </div>
          <div class="row mb-5">
              @forelse($days as $key=>$day)
              <div class="col-md-6 col-lg-4">
                <div class="card mb-3">
                  <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between align-items-center"> Jour {{$key+1}} : {{$day->name}} <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{route('theme.create',$day->id)}}"
                          ><i class='bx bx-add-to-queue'></i> Ajouter thèmes</a
                        >
                        <a class="dropdown-item" href="{{route('day.edit',$day)}}"
                          ><i class="bx bx-edit-alt me-1"></i>modifier</a
                        >
                        <form action="{{route('day.destroy',$day)}}" method="POST">
                          @method('delete')
                          @csrf
                          <button class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-trash me-1"></i>supprimer</button>
                        </form>
                      </div>
                    </div></h5>
                    <p class="card-text">la date : <b>{{$day->date}}</b></p>
                    <p class="card-text">Nombre de thèmes : <b>{{$day->themes->count()}}</b></p>
                    <a href="{{route('theme.index',$day->id)}}" class="btn btn-primary">Afficher les thèmes</a>
                  </div>
                </div>
              </div>
      
              @empty
              @endforelse
          </div>
        </div>
</x-app-layout>