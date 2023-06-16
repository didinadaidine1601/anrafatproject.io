<div class="content-panel" id="formAdd" style="display: none;">
    <div id="unseen">
        <h4><i class="fa fa-angle-right"></i>{{ __($titre) }}</h4>


        <form class="form-horizontal">
            @csrf
            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="matiere">{{ __('Matiere') }}</label>
                <div class="col-lg-8">
                    <select class="form-control" name="matiere" id="matiere"
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
                        name="note" class="form-control" id="notes"><br>
                    @error('note')
                        <span style="color: red;font-family: monospace;font-size: 16px;">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div class="col-lg-10 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="matricule">{{ __('Matricule') }}</label>
                <div class="col-lg-8">
                    <input type="number" style="text-align: center" name="matricule" class="form-control" id="matricule"><br>
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
                        <option style="text-align: center" value="{{ $item->id }}">{{ $item->nom }}&nbsp;&nbsp;{{$item->niveau}}</option>
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
                    <button class="btn btn-theme" type="button" id="btnAddlist">{{ __('Ajouter') }}</button>
                    <button class="btn btn-theme04" type="button" id="btn_close">{{ __('Fermer') }}</button>
                </div>

            </div>

        </form>

        <table id="todo" class="table table-hover">
            <thead>
                <th>{{ __('Etudiant') }}</th>
                <th>{{ __('Matière') }}</th>
                <th>{{ __('Note') }}</th>
                <th>{{ __('') }}</th>
            </thead>
            <tbody id="listchaine">

            </tbody>
            <tfoot>
                <td>
                    <form method="post" id="form_addNote" >
                        @csrf
                        <button type="submit" style="color:white" id="btn_save"
                         class="btn btn-black bg-theme">Sauvegarder</button>
                    </form>
                </td>
            </tfoot>
        </table>
    </div>
</div>
