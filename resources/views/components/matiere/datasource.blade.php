<div class="content-panel" id="datasource">
    <section id="unseen">

        <table cellpadding="0" cellspacing="0" class="display table table-striped table-condensed" id="hidden-table-info">
            <h4><i class="fa fa-angle-right"></i> {{ __($titre) }}
                <button class="btn btn-primary btn-sm" style="position: relative; left: 30%" id="btn_add">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter</button>
            </h4>
            <thead>
                <tr>
                    <th>{{ __('Nom_matiere') }}</th>
                    <th>{{ __('Volume_horaire') }}</th>
                    <th>{{ __('Nom_enseignant') }}</th>
                    <th>{{ __('Preom_enseignant') }}</th>
                    <th>{{ __('Profession') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->nom_mat }}</td>
                        <td>{{ $item->volume_horaire }}</td>
                        <td>{{ $item->nom_esg }}</td>
                        <td>{{ $item->prenom_esg }}</td>
                        <td>{{ $item->matricule }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <div style="display: flex;">
                                <div>
                                    <button class="btn btn-primary btn-sm" id="btn_edit{{$item->id}}">
                                        <i class="fa fa-edit 2-x" ></i>

                                    </button>

                                </div>
                                <!-- espace en html -->
                                &nbsp;
                                &nbsp;


                                <div>
                                    <form method="Post" action="{{ route('delete_matiere', ['matiere'=>$item->id]) }}">
                                        @csrf
                                        @method("DELETE")
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
    </section>
</div>

