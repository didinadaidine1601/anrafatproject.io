<div class="content-panel" id="datasource">
    <section id="unseen">

        <table cellpadding="0" cellspacing="0" class="display table table-striped table-condensed" id="hidden-table-info">
            <h4><i class="fa fa-angle-right"></i> {{ __($titre) }}
                <button class="btn btn-primary btn-sm" style="position: relative; left: 30%" id="btn_add">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter</button>
            </h4>
            <thead>
                <tr>
                    <th>{{ __('Nom') }}</th>
                    <th>{{ __('Prénom') }}</th>
                    <th class="numeric">{{ __('Matricule') }}</th>
                    <th>{{ __('Profession') }}</th>
                    <th>{{ __('Téléphone') }}</th>
                    <th >{{ __('Email') }}</th>
                    <th >{{ __('') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr class="@if($item->id %2)gradeX @else gradeA @endif">
                        <td>{{ __($item->nom) }}</td>
                        <td>{{ __($item->prenom) }}</td>
                        <td class="numeric">{{ __($item->matricule) }}</td>
                        <td>{{ __($item->profession) }}</td>
                        <td>{{ __($item->telephone) }}</td>
                        <td >{{ __($item->email) }}</td>
                        <td >
                            @php
                                $user = $item->id;
                            @endphp
                            <div style="display: flex;margin: 5px">
                                <div>
                                    <button class="btn btn-primary btn-sm" type="button" id="btn_edit{{ $item->id }}">
                                        <i class="fa fa-pencil"></i></button>
                                </div>
                                &nbsp;&nbsp;
                                <div>
                                    <form action="{{ route('deluser', ['user' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" id="btn_del{{ $item->id }}">
                                            <i class="fa fa-trash"></i></button>
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



