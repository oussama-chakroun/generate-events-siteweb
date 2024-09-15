<x-app-layout>
    <form action="{{route('theme.update',$theme)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-xl-9">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Les thémes et les video</h5>
            </div>
            <div class="card-body" id="all-inputs">
                    <div class="row" >
                        <div class="mb-3 col col-md-4 col-xl-4">
                            <label class="form-label" for="basic-default-fullname">Url youtube</label>
                            <input type="text" name='video_url' class="form-control " value="{{$theme->video_url}}" id="basic-default-fullname" placeholder="Url youtube"/>
                            
                        </div>
                        <div class="mb-3 col col-md-4 col-xl-4">
                            <label class="form-label" for="basic-default-fullname">Url video</label>
                            <input type="text" name='path_video' class="form-control " value="{{$theme->path_video}}" id="basic-default-fullname" placeholder="Url video"/>
                            
                        </div>
                        <div class="mb-3 col col-md-3 col-xl-4">
                            <label class="form-label" for="bg_pc">Théme</label>
                            <input multiple type="file" class="form-control" id="bg_pc" name='image'  />
                            
                        </div>
                    </div>   
            </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card mb-4">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <a
              href="{{route('theme.index' ,$theme->day->id)}}"
              class="btn btn-secondary"
            >retourner
              </a>
                <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
            </div>
            </div>
        </div>
    </div>
</form>


</x-app-layout>