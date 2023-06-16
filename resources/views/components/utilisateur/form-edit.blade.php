<div class="content-panel" id="formEdit" style="display: none;">
    <h4><i class="fa fa-angle-right"></i>{{ __("Formulaire d'edition") }}</h4>

    <form class="form-horizontal" method="post" id="form_edituser">
        @csrf
        @method("PUT")
        <div class="form-inline">

            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-2" for="nom_edit">{{ __('Nom') }}</label>
                <div class="col-lg-8">
                    <input type="text" name="nom" class="form-control" id="nom_edit">
                </div>
            </div>

            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="prenom_edit">{{ __('Prénom') }}</label>
                <div class="col-lg-8">
                    <input type="text" name="prenom" class="form-control" id="prenom_edit">
                </div>
            </div>

        </div>

        <div class="form-inline">
            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-2" for="matricule_edit">{{ __('Matricule') }}</label>
                <div class="col-lg-8">
                    <input type="number" name="matricule" class="form-control" id="matricule_edit">
                </div>
            </div>

            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="telephone_edit">{{ __('Téléphone') }}</label>
                <div class="col-lg-8">
                    <input type="text" name="telephone" class="form-control" id="telephone_edit">
                </div>
            </div>
        </div>


        <div class="form-inline">
            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-2" for="profession_edit">{{ __('Proféssion') }}</label>
                <div class="col-lg-8">
                    <select class="form-control" name="profession" id="profession_edit">
                        <option value="Etudiant">{{__('Etudiant')}}</option>
                        <option value="Enseignant">{{__('Enseignant')}}</option>
                        <option value="Administrateur">{{__('Administrateur')}}</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="email_edit">{{ __('Email') }}</label>
                <div class="col-lg-8">
                    <input type="email" name="email" class="form-control" id="email_edit">
                </div>
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
