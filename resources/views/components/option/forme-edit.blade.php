<div class="content-panel" id="formEdit" style="display: none;">
    <div id="unseen">
        <h4><i class="fa fa-angle-right"></i>{{ __($titre) }}</h4>

        <form class="form-horizontal" method="post" id="EditForm" >
            @csrf
            @method("PUT")
            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="nom_edit">{{ __("Nom de l'option") }}</label>
                <div class="col-lg-8">
                    <input type="text"
                        @error('nom') 
                        style="border: 1px solid red;text-align: center"
                    @enderror
                        name="nom" class="form-control" id="nom_edit"><br>
                    @error('nom')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="niveau">{{ __('Niveau') }}</label>
                <div class="col-lg-8">
                    <select class="form-control"  name="niveau" id="niveau_edit"
                        @error('nom') 
                        style="border: 1px solid red;text-align: center"
                    @enderror>
                        <option style="text-align: center" value="L1">L1</option>
                        <option style="text-align: center" value="L2">L2</option>
                        <option style="text-align: center" value="L3">L3</option>
                        <option style="text-align: center" value="M1">M1</option>
                        <option style="text-align: center" value="M2">M2</option>
                    </select>
                    <br>
                    @error('niveau')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="mention_edit">{{ __('Mention') }}</label>
                <div class="col-lg-8">
                    <select class="form-control" name="mention" id="mention_edit"
                        @error('mention') 
                        style="border: 1px solid red;text-align: center"
                    @enderror>
                        @foreach ($list as $item)
                            <option value="{{$item->id}}" style="text-align: center">{{$item->nom}}</option>
                        @endforeach
                    </select><br>
                    @error('mention')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

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
