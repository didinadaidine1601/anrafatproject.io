<div class="content-panel" id="formEdit" style="display: none;">
    <div id="unseen">
        <h4><i class="fa fa-angle-right"></i>{{ __($titre) }}</h4>

        <form class="form-horizontal" method="POST" id="formeditNote">
            @csrf
            @method("PUT")
            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="matiere">{{ __('Matiere') }}</label>
                <div class="col-lg-8">
                    <select class="form-control" name="matiere" id="matiere_edit"
                        @error('matiere') 
                    style="border: 1px solid red"@enderror>
                        @foreach ($matiere as $item)
                            <option style="text-align: center" value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('matiere')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="note">{{ __('Note') }}</label>
                <div class="col-lg-8">
                    <input type="number"
                        style="text-align: center;@error('note') 
                        border: 1px solid red
                    @enderror"
                        name="note" class="form-control" id="notes_edit"><br>
                    @error('note')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="matricule">{{ __('Matricule') }}</label>
                <div class="col-lg-8">
                    <input type="number" style="text-align: center" name="matricule" class="form-control"
                        id="matricule_edit"><br>
                    <span style="font-family: monospace;font-size: 16px;" id="nom_etudiant"></span>
                    <input type="hidden" name="idUser">

                </div>
            </div>


            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="classe">{{ __('Classe') }}</label>
                <div class="col-lg-8">

                    <select class="form-control" name="classe" id="classe"
                        @error('matiere') 
                    style="border: 1px solid red"@enderror>
                        @foreach ($option as $item)
                            <option style="text-align: center" value="{{ $item->id }}">
                                {{ $item->nom }}&nbsp;&nbsp;{{ $item->niveau }}</option>
                        @endforeach

                    </select>
                    <br>
                    @error('classe')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="coefficient">{{ __('Coefficient') }}</label>
                <div class="col-lg-8">
                    <input type="number"
                        style="text-align: center;@error('coefficient') 
                       border: 1px solid red
                    @enderror"
                        name="coefficient" class="form-control" id="coefficient"><br>
                    @error('coefficient')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-8">
                    <button class="btn btn-theme" type="submit" id="btnAdd">{{ __('Modifier') }}</button>
                    <button class="btn btn-theme04" type="button" id="btn_close_edit">{{ __('Fermer') }}</button>
                </div>

            </div>

        </form>
    </div>
</div>
