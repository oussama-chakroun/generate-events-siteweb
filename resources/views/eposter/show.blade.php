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
    <form action="{{route('event-eposter',$event->id)}}" onsubmit="" method="POST" >
        @method('delete')
        @csrf
    <div class="card mb-4">
        <div class="card-body">
            
          <div class="row gy-3">
            <!-- Default Modal -->
            <div class="col-lg-4 col-md-6">
                <p >Liste des eposters</p>
            </div>
            <!-- Vertically Centered Modal -->
            <div class="col-lg-3 col-md-6">
              
            </div>

            <!-- Slide from Top Modal -->
            <div class="col-lg-5 col-md-6 d-flex justify-content-end align-items-center">
              <div class="mt-3">
              <!-- Button trigger modal -->
              <button
              class="btn btn-danger"
            >supprimer
              </button>
              <a
              href="{{route('event.index')}}"
              class="btn btn-secondary"
            >retourner
              </a>
              <a
              href="{{route('event-eposter',$event->id)}}"
              class="btn btn-primary"
            >Ajouter eposters
              </a>
          </div>
            </div>
        </div>
    <div class="col-lg-8">
        <div class="demo-inline-spacing mt-3">
          <div class="list-group">
            @forelse($event->eposters as $eposter)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>
                    <input class="form-check-input me-1" type="checkbox" name="to_delete[]" value="{{$eposter->id}}" />
                    {{$eposter->name}}
                </span>
                <a target="_blank" href="{{asset('images/'.$eposter->event->name.'/eposter/'.$eposter->pdf)}}" class="btn badge bg-info">voir pdf <i class='bx bx-link-external' ></i></a>
              </li>
            @empty
            @endforelse
          </div>
        </div>
      </div>
    </form>
<script>

</script>
</x-app-layout>