<div class="content-panel" id="formEdite" style="display: none;position: relative;">
    <div class="unseen">
        <h4><i class="fa fa-angle-right"></i>{{ __($titre) }}</h4>
        <form class="form-horizontal" method="post" id="formeditmatiere">
            @csrf
            @method("PUT")
            <div class="form-inline">
                <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4" for="nom_edit">{{ __('Nom matiere') }}</label>
                    <div class="col-lg-8">
                        <input type="text"
                            @error('nom') 
                    style="border: 1px solid red"
                @enderror
                            name="nom" class="form-control" id="nom_edit"><br>
                        @error('nom')
                            <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>

                <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4"
                        for="volume_horaire_edit">{{ __('Volume horaire') }}</label>
                    <div class="col-lg-8">
                        <input type="number" name="volume_horaire"
                            @error('volume_horaire')
                style="border: 1px solid red"
                
                @enderror
                            class="form-control" id="volume_horaire_edit"><br>
                        @error('volume_horaire')
                            <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="form-inline">
                <div class="col-lg-12 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4"
                        for="iduser_edit">{{ __("Nom de l'enseignant") }}</label>
                    <select name="_iduser" class="form-control" id="iduser_edit">

                        @foreach ($listProf as $item)
                            <option value="{{ $item->id }}">{{ __($item->nom) }} &nbsp;&nbsp;{{ $item->prenom }}
                            </option>
                        @endforeach
                    </select>

                </div>

            </div>


            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-8">
                    <button class="btn btn-theme" type="submit">{{ __('Modifier') }}</button>
                    <button class="btn btn-theme04" type="button" id="btn_close_edit">{{ __('Fermer') }}</button>
                </div>
            </div>

        </form>
    </div>
</div>
