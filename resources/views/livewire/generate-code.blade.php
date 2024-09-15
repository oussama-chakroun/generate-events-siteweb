<div class="container">
    <div class="card d-flex justify-content-center align-items-center" style="height: 80vh">
        <div class="progress w-75 mt-5 mb-5">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: {{$progress}}%"
              aria-valuenow="{{$progress}}"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              {{$progress}}%
            </div>
        </div>
        <div class="d-flex flex-row m-5">
            <button class="btn btn-primary m-2" wire:click='generate' >Générer</button>
            <button @if($disabled) disabled @endif class="btn btn-success m-2" wire:click='download' >Télecharger</button>
            <a href="{{route('event.index')}}" class="btn btn-secondary m-2" >retourner</a>

        </div>
    </div>
</div>
