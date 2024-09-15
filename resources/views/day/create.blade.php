<x-app-layout>
    <form action="{{route('day.store',$event_id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$event_id}}" name="event_id">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Informations de l'événement</h5>
                </div>
                <div class="card-body">

                        <div class="row">
                            <div class="mb-3 col col-md-6 col-xl-6">
                                <label class="form-label" for="basic-default-fullname">Jour</label>
                                <input disabled type="text"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" placeholder="jour" />
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-6 col-xl-6">
                                <label class="form-label" for="basic-default-fullname">La date</label>
                                <input type="date" name='date' value="{{old('date')}}" class="form-control @error('date') is-invalid @enderror" id="basic-default-fullname" placeholder="secendary color" />
                                @error('date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="d-flex m-4 justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
                    <a href="{{route('day.index',$event_id)}}" class="btn btn-secondary m-2">Annuler & retour</a>
                </div>
            </div>
        </div>

           
        </div>
    </div>
</form>
</x-app-layout>