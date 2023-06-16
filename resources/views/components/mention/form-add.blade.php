<div class="content-panel" id="formAdd" style="display: none;">
    <div id="unseen">
        <h4><i class="fa fa-angle-right"></i>{{ __($titre) }}</h4>


        <form class="form-horizontal" method="post" action="{{ route('ajout_mention') }}">
            @csrf
                <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                    <label class="col-sm-2 control-label col-lg-4" for="nom">{{ __('Nom de la mention') }}</label>
                    <div class="col-lg-8">
                        <input type="text"
                            @error('nom') 
                        style="border: 1px solid red"
                    @enderror
                            name="nom" class="form-control" id="nom"><br>
                        @error('nom')
                            <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>


            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-8">
                    <button class="btn btn-theme" type="submit">{{ __('Ajouter') }}</button>
                    <button class="btn btn-theme04" type="button" id="btn_close">{{ __('Fermer') }}</button>
                </div>
            </div>

        </form>
    </div>
</div>
