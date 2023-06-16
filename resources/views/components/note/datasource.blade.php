@php
    use App\Models\User;
@endphp
<div class="content-panel" id="datasource">
    <section id="unseen">
        <div class="panel-heading">
            <div class="pull-left">
                <h4><i class="fa fa-angle-right"></i> {{ __($titre) }}
                    <button class="btn btn-primary btn-sm" style="position: relative; left: 30%" id="btn_add">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter</button>
                        <button class="btn btn-primary btn-sm" style="position: relative; left: 30%" id="btn_print">
                            <i class="fa fa-print"></i>&nbsp;&nbsp;Imprimer</button>
                </h4>
            </div>
           
        </div>
        <!-- tableau -->
        <div class="custom-check goleft mt">
            <table id="hidden-table-info"
            style="margin: 2px"
             class="table table-hover custom-check">
                <thead>
                    <th>{{ __('Etudiant') }}</th>
                    <th>{{ __('Matière') }}</th>
                    <th>{{ __('Enseignant') }}</th>
                    <th>{{ __('') }}</th>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                        <tr>
                            <td>
                                <span class="badge bg-theme">
                                    <label> {{ $item->niveau }}&nbsp;&nbsp;{{ $item->classe }} </label>
                                </span>
                                <label> {{ $item->nom_etd }}&nbsp;&nbsp;{{ $item->prenom_etd }} </label>
                            </td>
                            <td>
                                <span class="badge bg-theme">
                                    <label> {{ $item->note }} </label>
                                </span>
                                <label> {{ $item->matiere }} </label>
                            </td>
                            <td>
                                @php
                                    $enseignant = User::selectRaw('users.*')
                                        ->where('id', $item->idenseignant)
                                        ->get();
                                @endphp
                                @foreach ($enseignant as $ens)
                                    <span class="check">
                                        <label class="badge bg-theme">{{ $ens->matricule }}</label>
                                    </span>
                                    <label> {{ $ens->nom }}&nbsp;&nbsp;{{ $ens->prenom }} </label>
                                @endforeach
                            </td>
                            <td>
                                <div style="display: flex;float:right">
                                    <div>
                                        <button class="btn btn-primary btn-sm" id="btn_edit{{$item->id}}">
                                            <i class="fa fa-edit 2-x"></i>
                                        </button>

                                    </div>
                                    <!-- espace en html -->
                                    &nbsp;
                                    &nbsp;
                                    <div>
                                        <form method="Post" action="{{ route('del_note', ['note'=>$item->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash 2-x"></i>
                                            </button>
                                        </form>
                                    </div>


                                </div>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <!-- /table-responsive -->
    </section>
</div>


