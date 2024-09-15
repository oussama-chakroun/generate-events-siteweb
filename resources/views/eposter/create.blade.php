<x-app-layout>
    @if($errors->all())

    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible" role="alert">
    {{ $error }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
  @endif
    <form action="{{route('event-eposter',$event_id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-xl-9">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Informations de l'événement</h5>
            </div>
            <div class="card-body" id="all-inputs">
                    <div class="row" >
                        <div class="mb-3 col col-md-5 col-xl-6">
                            <label class="form-label" for="basic-default-fullname">Titre d'eposter</label>
                            <input type="text" name='name[]' class="form-control " id="basic-default-fullname" placeholder="Titre d'eposter"/>
                            
                        </div>
                        <div class="mb-3 col col-md-6 col-xl-5">
                            <label class="form-label" for="bg_pc">PDF</label>
                            <input multiple type="file" class="form-control" id="bg_pc" name='pdf[]' accept="application/pdf, application/vnd.ms-excel" />
                            
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
              href="{{route('event.index')}}"
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
                        <div class="mb-3 col col-md-5 col-xl-6">
                            <label class="form-label" for="basic-default-fullname">Titre d'eposter</label>
                            <input type="text" name='name[]' class="form-control " id="basic-default-fullname" placeholder="Titre d'eposter"/>
                            
                        </div>
                        <div class="mb-3 col col-md-6 col-xl-5">
                            <label class="form-label" for="bg_pc">PDF</label>
                            <input multiple type="file" class="form-control" id="bg_pc" name='pdf[]' accept="application/pdf, application/vnd.ms-excel" placeholder="backgound image pdf" />
                            
                        </div>
                        <div class="mb-3 col col-md-1 col-xl-1">
                            <label class="form-label" for="bg_pc"> &nbsp; &nbsp; </label>
                            <button type="button" onclick="removeElement(this);" class="btn btn-sm btn-danger"><i class='bx bx-trash-alt' ></i></button>
                        </div>
                    </div>`) 
}

    function removeElement(e){
        if(contentDiv.childElementCount > 1)
        e.parentElement.parentElement.remove();
    }

</script>


</x-app-layout>