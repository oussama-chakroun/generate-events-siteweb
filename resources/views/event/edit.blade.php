<x-app-layout>
    <form action="{{route('event.update',$event)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Informations de l'événement</h5>
                </div>
                <div class="card-body">
                        <div class="row">

                            <div class="mb-3 col col-md-12 col-xl-12">
                                <label class="form-label" for="basic-default-fullname">Nom de l'événement</label>
                                <input type="text" name='name' class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" placeholder="Nom de l'événement" value="{{$event->name}}"/>
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-6 col-xl-6">
                                <label class="form-label" for="basic-default-fullname">primary color</label>
                                <input type="color" name='primary_color' value="{{$event->primary_color}}" class="form-control @error('primary_color') is-invalid @enderror" id="basic-default-fullname" placeholder="primary color" />
                                @error('primary_color')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-6 col-xl-6">
                                <label class="form-label" for="basic-default-fullname">secendary color</label>
                                <input type="color" name='secendary_color' value="{{$event->secendary_color}}" class="form-control @error('secendary_color') is-invalid @enderror" id="basic-default-fullname" placeholder="secendary color" />
                                @error('secendary_color')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="card mb-1 col col-xl-6 col-md-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Médias</h5>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col col-md-12 col-xl-12">
                                    <label class="form-label" for="Logo">Logo</label>
                                    <input type="file" class="form-control" id="Logo" name='logo' value="{{$event->logo}}" placeholder="logo" />
                        
                                </div>
                                <div class="mb-3 col col-md-12 col-xl-12">
                                    <label class="form-label" for="header">header</label>
                                    <input type="file" class="form-control @error('header') is-invalid @enderror" id="header" name='header' placeholder="header" />
                                    @error('header')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col col-md-12 col-xl-12">
                                    <label class="form-label" for="bg_pc">Backgound image pc</label>
                                    <input type="file" class="form-control @error('thumbnail_pc') is-invalid @enderror" id="bg_pc" name='thumbnail_pc' value="{{$event->thumbnail_pc}}" placeholder="backgound image pc" />
                                    @error('thumbnail_pc')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col col-md-12 col-xl-12">
                                    <label class="form-label" for="mobile">Backgound image mobile</label>
                                    <input type="file" class="form-control @error('thumbnail_mobile') is-invalid @enderror" name="thumbnail_mobile" value="{{$event->thumbnail_mobile}}" id="mobile" placeholder="backgound image pc" />
                                    @error('thumbnail_mobile')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
                        <a href="{{route('event.index')}}" class="btn btn-secondary">Annuler & retour</a>
    
                            </div>
                            </div>
                        
                </div>
            <div class="card mb-1 col col-xl-6 col-md-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Les boutons & Possition</h5>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col col-md-6 col-xl-6">
                                <label class="form-label" for="btn_x_pc">Pc x (0-80)</label>
                                <input type="number" class="form-control @error('btn_x_pc') is-invalid @enderror" id="btn_x_pc" name='btn_x_pc' value="{{$event->btn_x_pc}}" placeholder="pc x" min="0" max="80"/>
                                @error('btn_x_pc')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-6 col-xl-6">
                                <label class="form-label" for="btn_y_pc">Pc y (0-60)</label>
                                <input type="number" class="form-control @error('btn_y_pc') is-invalid @enderror" id="btn_y_pc" name='btn_y_pc' value="{{$event->btn_y_pc}}" placeholder="px y" min="0" max="60"/>
                                @error('btn_y_pc')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-6 col-xl-6">
                                <label class="form-label" for="btn_x_mobile">mobile x (0-40)</label>
                                <input type="number" class="form-control @error('btn_x_mobile') is-invalid @enderror" id="btn_x_mobile" name='btn_x_mobile' value="{{$event->btn_x_mobile}}" placeholder="Mobile x" min="0" max="40"/>
                                @error('btn_x_mobile')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-6 col-xl-6">
                                <label class="form-label" for="btn_y_mobile">Mobile y (0-66)</label>
                                <input type="number" class="form-control @error('btn_y_mobile') is-invalid @enderror" id="btn_y_mobile" name='btn_y_mobile' value="{{$event->btn_y_mobile}}" placeholder="Mobile y" min="0" max="66"/>
                                @error('btn_y_mobile')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-12 col-xl-12">
                                <label class="form-label" for="btn_acc">Acceuil</label>
                                <input type="file" class="form-control @error('btn_acc') is-invalid @enderror" id="btn_acc" name='btn_acc' value="{{$event->btn_acc}}" placeholder="btnacc" />
                                @error('btn_acc')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-12 col-xl-12">
                                <label class="form-label" for="btn_pro">Programme</label>
                                <input type="file" class="form-control @error('btn_pro') is-invalid @enderror" id="btn_pro" name='btn_pro' value="{{$event->btn_pro}}" placeholder="btnacc" />
                                @error('btn_pro')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-12 col-xl-12">
                                <label class="form-label" for="btn_epo">E-poster</label>
                                <input type="file" class="form-control @error('btn_epo') is-invalid @enderror" id="btn_epo" name='btn_epo' value="{{$event->btn_epo}}" placeholder="logo" />
                                @error('btn_epo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col col-md-12 col-xl-12">
                                <label class="form-label" for="btn_red">Redifusion</label>
                                <input type="file" class="form-control @error('btn_red') is-invalid @enderror" id="btn_red" name='btn_red' value="{{$event->btn_red}}" placeholder="backgound image pc" />
                                @error('btn_red')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                    
                    
                </div>
        </div>
            </div>
        </div>

           
        </div>
    </div>
</form>
</x-app-layout>