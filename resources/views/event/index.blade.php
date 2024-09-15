<x-app-layout>
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
  @if(Session::has('error'))
  <div class="alert alert-danger alert-dismissible" role="alert">
    {{ Session::get('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <div class="card mb-4">
        
        <div class="card-body">
          <div class="row gy-3">
            <!-- Default Modal -->
            <div class="col-lg-6 col-md-6">
              <h5 class="card-header">Liste des événements</h5>
            </div>

            <!-- Slide from Top Modal -->
            <div class="col-lg-6 col-md-6 d-flex justify-content-end align-items-center">
              <div class="mt-3">
              <!-- Button trigger modal -->
              <a
              href="{{route('event.create')}}"
              class="btn btn-primary"
            >créer un évènement
              </a>
          </div>
            </div>
          </div>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive text-nowrap" style="height: 60vh">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th>événement</th>
                <th>programe</th>
                <th>E-poster</th>
                <th>jours</th>
                {{-- <th>boutons</th> --}}
                <th>images</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($events as $event)
              <tr>
                <td>
                  <img class="avatar-md" width="50px" height="50px" src="{{asset('images/'.$event->name.'/background/'.$event->logo)}}" >
                  <strong>{{$event->name}}</strong>
                </td>
                <td> <a href="{{route('event-programme-show',$event->id)}}" style="padding: 5px 8px; background-color: #6883BC;color: white; border-radius:5px;font-size:13px;"><i class='bx bx-list-ul'></i> Programe({{$event->programmes->count()}})</a> </td>
                <td> <a href="{{route('event-eposter-show',$event->id)}}" style="padding: 5px 8px; background-color: #CC313D;color: white; border-radius:5px;font-size:13px;"><i class='bx bx-file-blank'></i> E-poster({{$event->eposters->count()}})</a> </td>
                <td> <a href="{{route('day.index',$event->id)}}" style="padding: 5px 8px; background-color: #2C5F2D;color: white; border-radius:5px;font-size:13px;"><i class='bx bx-calendar-week' style="font-size: 15px"></i> jours({{$event->days->count()}})</a> </td>
                {{-- <td> <a href="" style="padding: 5px 8px; background-color: #8A307F;color: white; border-radius:5px;font-size:13px;"><i class='bx bx-list-ul'></i> boutons({{$event->btns->count()}})</a> </td> --}}
                <td> <a href="{{route('event-image-show',$event->id)}}" style="padding: 5px 8px; background-color: #783937;color: white; border-radius:5px;font-size:13px;"><i class='bx bx-images' ></i> images({{$event->images->count()}})</a> </td>

                {{-- <td><span class="badge bg-label-warning me-1">Pending</span></td> --}}
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{route('event.show', $event)}}"
                        ><i class="bx bx-show me-1"></i>Aperçu sur l'événement </a
                      ><a class="dropdown-item" href="{{route('generate-code-source', $event)}}"
                        ><i class='bx bx-folder-plus'></i> Générer le code source </a
                      >
                      <a class="dropdown-item" href="{{route('event.download', $event)}}"
                        ><i class='bx bx-cloud-download'></i> télécharger le code source </a
                      >
                      <a class="dropdown-item" href="{{route('event.edit',$event)}}"
                        ><i class="bx bx-edit-alt me-1"></i> modifier</a
                      >
                      <a class="dropdown-item" href="javascript:void(0);"
                        ><i class="bx bx-trash me-1"></i>supprimer</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
              @empty
                  
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
</x-app-layout>