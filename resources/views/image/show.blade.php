<x-app-layout>
  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <div class="card mb-4">
        <div class="card-body">
            
          <div class="row gy-3">
            <!-- Default Modal -->
            <div class="col-lg-4 col-md-4">
                <p >Les images de l'évènement</p>
            </div>

            <!-- Slide from Top Modal -->
            <div class="col-lg-8 col-md-8 d-flex justify-content-end align-items-center">
              <div class="mt-3">
              <!-- Button trigger modal -->
              <form onsubmit="return confirm('Êtes-vous sûr de vouloir valider la suppression?')" action="{{route('event-image',$event)}}" class="d-inline" method="POST">
                @method('delete')
                @csrf
                <button class="btn btn-danger">Supprimer tout</button>
                </form>
              <a
              href="{{route('event.index')}}"
              class="btn btn-secondary"
            >retourner
              </a>
              <a
              href="{{route('event-image',$event->id)}}"
              class="btn btn-primary"
            >Ajouter images
              </a>
          </div>
            </div>
          </div>
    <div class="row">
        @forelse($event->images as $image)
            <div class="col-sm-3 col-lg-2 mt-2 mb-2">
              <div class="card">
                  <img style="height: 130px;" src="{{asset('images/'.$event->name.'/images/low/'.$image->image)}}" alt="Card image cap" />
              </div>
                
            </div>
        @empty
        @endforelse
        
    </div>
</div>

</x-app-layout>