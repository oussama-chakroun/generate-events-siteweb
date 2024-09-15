<x-app-layout>
    <form action="{{route('theme.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="day_id" value="{{$day_id}}">
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
                            <input type="text" name='video_url[]' class="form-control " id="basic-default-fullname" placeholder="Url youtube"/>
                            
                        </div>
                        <div class="mb-3 col col-md-4 col-xl-4">
                            <label class="form-label" for="basic-default-fullname">Url video</label>
                            <input type="text" name='path_video[]' class="form-control " id="basic-default-fullname" placeholder="Url video"/>
                            
                        </div>
                        <div class="mb-3 col col-md-3 col-xl-3">
                            <label class="form-label" for="bg_pc">Théme</label>
                            <input multiple type="file" class="form-control" id="bg_pc" name='image[]'  />
                            
                        </div>
                        <div class="mb-3 col col-md-1 col-xl-1">
                            <label class="form-label" for="bg_pc"> &nbsp; &nbsp; </label>
                            <button type="button" onclick="removeElement(this);" class="btn btn-sm btn-danger"><i class='bx bx-trash-alt' ></i></button>
                        </div>
                    </div>   
            </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card mb-4">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <a
              href="{{route('day.index' ,$event_id)}}"
              class="btn btn-secondary"
            >retourner
              </a>
                <button type="submit" class="btn btn-primary mt-4">créer les eposters</button>
                <button type="button" class="btn btn-success mt-4" onclick="addElement()">Ajouter autre eposter</button>
            </div>
            </div>
        </div>
    </div>
</form>
<script>
    const contentDiv = document.getElementById('all-inputs');
    function addElement() {

    contentDiv.insertAdjacentHTML('beforeend', `
    <div class="row" >
                        <div class="mb-3 col col-md-4 col-xl-4">
                            <label class="form-label" for="basic-default-fullname">Url youtube</label>
                            <input type="text" name='video_url[]' class="form-control " id="basic-default-fullname" placeholder="Titre d'eposter"/>
                            
                        </div>
                        <div class="mb-3 col col-md-4 col-xl-4">
                            <label class="form-label" for="basic-default-fullname">Url youtube</label>
                            <input type="text" name='path_video[]' class="form-control " id="basic-default-fullname" placeholder="Titre d'eposter"/>
                            
                        </div>
                        <div class="mb-3 col col-md-3 col-xl-3">
                            <label class="form-label" for="bg_pc">Théme</label>
                            <input multiple type="file" class="form-control" id="bg_pc" name='image[]' />
                            
                        </div>
                        <div class="mb-3 col col-md-1 col-xl-1">
                            <label class="form-label" for="bg_pc"> &nbsp; &nbsp; </label>
                            <button type="button" onclick="removeElement(this);" class="btn btn-sm btn-danger"><i class='bx bx-trash-alt' ></i></button>
                        </div>
                    </div>  `) 
}

    function removeElement(e){
        if(contentDiv.childElementCount > 1)
        e.parentElement.parentElement.remove();
    }

</script>


</x-app-layout>