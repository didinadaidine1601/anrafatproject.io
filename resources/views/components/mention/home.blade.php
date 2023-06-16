@extends('components.app')

{{-- section pour style css --}}

@section('stylecss')
@endsection

{{-- section pour le content --}}
@section('content')
    <div class="row mt">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-sm-12">
            <h4 class="center">
                </i>{{ __('Gestion de mentions') }}
            </h4>
            <div class="row">
                <!-- /col-md-12 -->
                <div class="col-md-12 col-lg-12 mt">
                    <!-- **********************************************
                                                                    composant pour un tableau de donnée
                                                                ***************************************************-->
                    <x-mention.datasource titre="Liste des mentions" :list="$mention" />
                    <!-- **********************************************
                                                                 composant pour le formulaire d'ajout des donnée
                                                                ***************************************************-->
                    <x-mention.form-add titres="Formulaire d'ajout des mentions" />

                    <!-- **********************************************
                                                                    composant pour le formulaire d'edition des donnée
                                                                ***************************************************-->
                    <x-mention.form-edit titre="Formulaire d'édition" />

                </div>
                <!-- /col-md-12 -->
            </div>

        </div>
    </div>
@endsection

{{-- section apport js - --}}

@section('styleJs')
    <script type="text/javascript" language="javascript"
        src="{{ asset('lib/advanced-datatable/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/advanced-datatable/js/DT_bootstrap.js') }}"></script>


    {{-- initialisation du jquery --}}
    <script>
        $(() => {
            let btn_show_form = $('button#btn_add')
            let blocData = $('div#datasource')
            let blocFormAdd = $('div#formAdd')
            let blocFormEdit = $('div#formEdit')
            let btnClose = $('button#btn_close')
            let btnCloseEdit = $('button#btn_close_edit')
            let nom = $('input#nom_edit')
            let formEdit = $('form#editForm')

            let mention = []
            @foreach ($mention as $item)
                mention.push({
                    "id": {{ $item->id }},
                    "nom": "{{ $item->nom }}"
                })
            @endforeach

            {{-- evenement de click sur le button editer --}}

            mention.map((value, index) => {
                let btn_edit = $('button#btn_edit' + value.id)
                btn_edit.on('click', (event) => {
                    event.preventDefault()
                    blocData.hide()
                    blocFormEdit.show()
                    //saisir le nom sur le champ
                    let url = "updatemention/" + value.id
                    nom.val(value.nom);
                    formEdit.attr('action', url)

                })
            })




            {{-- evenement de click sur le button ajouter --}}
            btn_show_form.on('click', (envent) => {
                envent.preventDefault()
                blocData.hide()
                blocFormAdd.show()
            })
            {{-- evenement de click sur le button close --}}
            btnClose.on('click', (event) => {
                event.preventDefault()
                blocData.show()
                blocFormAdd.hide()
            })
            {{-- evenement de click sur le button fermer du formulaire de mise ajour --}}

            {{-- evenement de click sur le button close --}}
            btnCloseEdit.on('click', (event) => {
                event.preventDefault()
                blocData.show()
                blocFormEdit.hide()
            })


        })

        {{-- style du datatable --}}
        $(document).ready(function() {
            /*
             * Insert a 'details' column to the table
             */
            var nCloneTh = document.createElement('th');
            var nCloneTd = document.createElement('td');
            nCloneTd.innerHTML = '';
            nCloneTd.className = "center";

            $('#hidden-table-info thead tr').each(function() {
                this.insertBefore(nCloneTh, this.childNodes[0]);
            });

            $('#hidden-table-info tbody tr').each(function() {
                this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
            });

            /*
             * Initialse DataTables, with no sorting on the 'details' column
             */
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],
                "aaSorting": [
                    [1, 'asc']
                ]
            });


        });
    </script>
@endsection
