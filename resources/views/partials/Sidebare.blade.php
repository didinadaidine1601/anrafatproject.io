<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="javascript:;">
                    <img src="{{ asset('images/logo.png') }}" class="img-circle" width="80">
                </a>
            </p>
            <h5 class="centered">{{ __('daidine soumaila') }}</h5>
            <li class="mt">
                <a class="{{Route::is('racine')? 'active' :'' }}" href="{{ route('racine') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="{{Route::is('homenote')|| Route::is('homemention') || Route::is('homoption') || Route::is('homeuser') || Route::is('homematiere') ? 'active' : ''  }} ">
                    <i class="fa fa-desktop"></i>
                    <span> {{ __('Espace de travail') }} </span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('homeuser') }}" style="{{Route::is('homeuser') ? 'color:white;font-size:16px' :'filter:opacity(50%)'}}">Gestion d'utilisateur</a></li>
                    <li><a href="{{ route('homematiere') }}" style="{{Route::is('homematiere')? 'color:white;font-size:16px' :'filter:opacity(50%)'}}">Gestion des Matieres</a></li>
                    <li><a href="{{ route('homenote') }}" style="{{Route::is('homenote') ? 'color:white;font-size:16px' :'filter:opacity(50%)'}}" >Gestion Notes</a></li>
                    <li><a href="{{ route('homemention') }}" style="{{Route::is('homemention')? 'color:white;font-size:16px' :'filter:opacity(50%)'}}">Mentions</a></li>
                    <li><a href="{{ route('homoption') }}" style="{{Route::is('homoption')? 'color:white;font-size:16px' :'filter:opacity(50%)'}}">Options</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
