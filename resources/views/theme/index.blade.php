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
  <div class="card mb-3">
    <div class="row d-flex justify-content-end align-items-center p-3">
      <div class="col col-xl-4 col-md-4">
        <a
              href="{{route('day.index' ,$event_id)}}"
              class="btn btn-secondary"
            >retourner
              </a>
              <a
                    href="{{route('theme.create' ,$day_id)}}"
                    class="btn btn-primary"
                  >Ajouter thèmes
                    </a>
      </div>
    </div>
  </div>
  <div class="row ">
    @forelse($themes as $theme)
    <div class="col col-md-4 col-xl-4 mb-3">
      <div class="card h-100">
        <img class="card-img-top" style="height: 85px" src="{{asset('images/'.$theme->day->event->name.'/themes/'.$theme->day->name.'/'.$theme->image)}}" alt="Card image cap" />
        <div class="card-body">
          <h6 class="card-title">youtube : {{ $theme->video_url }}</h5>
            <div class="d-flex justify-content-between align-items-center">
              <button
                  type="button"
                  class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#youTubeModal"
                  onclick="setupVideo(this)"
                  data-theVideo="{{$theme->video_url}}"
                >
                <i class="bx bx-show me-1"></i> voir la video
              </button>
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                
              <a class="dropdown-item" href="{{route('theme.edit',$theme)}}"
                ><i class="bx bx-edit-alt me-1"></i>modifier</a
              >
              <form action="{{route('theme.destroy',$theme)}}" method="POST">
                @method('delete')
                @csrf
                <button class="dropdown-item"
                  ><i class="bx bx-trash me-1"></i>supprimer</button>
              </form>
          </div>
        </div>
        </div>
      </div>
    </div>
    @empty
    @endforelse
  </div>
    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
          <!-- Modal -->
          <div class="modal fade" id="youTubeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <iframe height="350" src="" id="video"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        function setupVideo(e){
          let ifarme = document.getElementById('video');
          ifarme.src = e.getAttribute('data-theVideo');
        }
      </script>
</x-app-layout>