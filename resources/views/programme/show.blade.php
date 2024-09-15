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
    <div class="card mb-4">
        <div class="card-body">
            
          <div class="row gy-3">
            <!-- Default Modal -->
            <div class="col-lg-4 col-md-6">
                <p >Liste de programme</p>
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
              href="{{route('event-programme',$event->id)}}"
              class="btn btn-primary"
            >Ajouter programme
              </a>
          </div>
            </div>
          </div>
    <div class="row">
        @forelse($event->programmes as $programme)
            <div class="col-sm-3 col-lg-2 mt-2 mb-2">
                <form action="{{route('event-programme',$programme)}}" method="POST">
                @method('delete')
                @csrf
                <div class="card" >
                    <img class="card-img-top" style="height: 200px" src="{{asset('images/'.$event->name.'/programme/'.$programme->image)}}" alt="Card image cap" />
                    <button class="btn btn-sm btn-danger">supprimer</button>
                </div>
                </form>
            </div>
        @empty
        @endforelse
        
    </div>
</div>

</x-app-layout>