<div class="content-panel" id="formAdd" style="display: none;position: relative;">
    <div class="unseen">
    <h4><i class="fa fa-angle-right"></i>{{ __($titre) }}</h4>
    <form class="form-horizontal" method="post" action="{{ route('ajout_user') }}">
        @csrf
        <div class="form-inline">
            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="nom">{{ __('Nom') }}</label>
                <div class="col-lg-8">
                    <input type="text"  @error('nom') 
                        style="border: 1px solid red"
                    @enderror name="nom" class="form-control" id="nom"><br>
                    @error("nom")
                    <span style="color: red;font-family: monospace;font-size: 16px;">{{$message}}</span>
                    @enderror
                   
                </div>
            </div>

            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="prenom">{{ __('Prénom') }}</label>
                <div class="col-lg-8">
                    <input type="text" name="prenom" @error('prenom')
                    style="border: 1px solid red"
                    
                    @enderror class="form-control" id="prenom"><br>
                    @error("prenom")
                    <span style="color: red;font-family: monospace;font-size: 16px;">{{$message}}</span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="form-inline">
            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="matricule">{{ __('Matricule') }}</label>
                <div class="col-lg-8">
                    <input type="number" @error('matricule')
                    style="border: 1px solid red"
                    
                    @enderror  name="matricule" class="form-control" id="matricule"><br>
                    @error("matricule")
                    <span style="color: red;font-family: monospace;font-size: 16px;">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="telephone">{{ __('Téléphone') }}</label>
                <div class="col-lg-8">
                    <input type="text"  @error('telephone')
                    style="border: 1px solid red"
                    
                    @enderror name="telephone" class="form-control" id="telephone"><br>
                    @error("telephone")
                    <span style="color: red;font-family: monospace;font-size: 16px;">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="form-inline">
            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="profession">{{ __('Proféssion') }}</label>
                <div class="col-lg-8">
                    <select class="form-control" name="profession" id="profession">
                        <option value="Etudiant">{{__('Etudiant')}}</option>
                        <option value="Enseignant">{{__('Enseignant')}}</option>
                        <option value="Administrateur">{{__('Administrateur')}}</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="email">{{ __('Email') }}</label>
                <div class="col-lg-8">
                    <input type="email"  @error('email')
                    style="border: 1px solid red"
                    
                    @enderror name="email" class="form-control" id="email"><br>
                    @error("email")
                    <span style="color: red;font-family: monospace;font-size: 16px;">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-inline">
            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4" for="password">{{ __('Mot de passe') }}</label>
                <div class="col-lg-8">
                    <input type="password" @error('password')
                    style="border: 1px solid red"
                    
                    @enderror  name="password" class="form-control" id="password"><br>
                   @error("password")
                   <span style="color: red;font-family: monospace;font-size: 16px;">{{$message}}</span>
                   @enderror
                </div>
            </div>

            <div class="col-lg-6 form-group has-dark" style="padding: 10px">
                <label class="col-sm-2 control-label col-lg-4"
                    for="passwordconf">{{ __('Retaper le mot de passe') }}</label>
                <div class="col-lg-8">
                    <input type="password" required name="passwordconf" class="form-control" id="passwordconf">
                </div>
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
