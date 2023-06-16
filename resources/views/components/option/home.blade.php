@extends('components.app')

{{-- section pour style css --}}

@section('stylecss')
@endsection

{{-- section pour le content --}}
@section('content')
    <div class="row mt">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-sm-12">
            <h4 class="center">
                </i>{{ __("Gestion d'options") }}
            </h4>
            <div class="row">
                <!-- /col-md-12 -->
                <div class="col-md-12 col-lg-12 mt">
                    <!-- **********************************************
                                                                                composant pour un tableau de donnée
                                                                            ***************************************************-->
                    <x-option.datasource titre="Liste des options" :list="$option" />
                    <!-- **********************************************
                                                                             composant pour le formulaire d'ajout des donnée
                                                                            ***************************************************-->
                    <x-option.forme-add titre="Formulaire d'ajout des options" :list="$mention" />

                    <!-- **********************************************
                                                                                composant pour le formulaire d'edition des donnée
                                                                            ***************************************************-->
                    <x-option.forme-edit titre="Formulaire d'édition" :list="$mention" />

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


            const btn_add = $("button#btn_add")
            const btn_close = $("button#btn_close")
            const btn_close_edit = $("button#btn_close_edit")
            const blocData = $('div#datasource')
            const blocformAdd = $('div#formAdd')
            const blocformEdite = $('div#formEdit')
            const formEdit = $('form#EditForm')
            const nom = $('input#nom_edit')


            let option = []

            @foreach ($option as $item)
                option.push({
                    id: {{ $item->id }},
                    niveau: "{{ $item->niveau }}",
                    nom: "{{ $item->nom }}",
                    idmention: {{ $item->_idmention }},
                    mention: "{{ $item->nom_mention }}"
                })
            @endforeach

            {{-- evenement lie sur le button ajouter --}}
            btn_add.on('click', () => {
                blocData.hide()
                blocformAdd.show()

            })




            {{-- evenement lie sur le button fermer --}}
            btn_close.on('click', () => {
                blocData.show()
                blocformAdd.hide()
            })

            btn_close_edit.on('click', () => {
                blocData.show()
                blocformEdite.hide()
                $(`select#niveau_edit option[selected=selected]`).removeAttr('selected')
                $(`select#mention_edit option[selected=selected]`).removeAttr('selected')

            })

            {{-- evenement lie sur le button editer --}}

            option.map((value, index) => {
                console.log(value);
                let btn_edit = $('button#btn_edit' + value.id)
                const niveau = $('select#niveau_edit option')

                btn_edit.on('click', () => {
                    blocData.hide()
                    blocformEdite.show()
                    $(`select#niveau_edit option[selected=selected]`).removeAttr('selected')
                    $(`select#mention_edit option[selected=selected]`).removeAttr('selected')
                    $('select#niveau_edit option[value=' + value.niveau + ']').attr('selected',
                        'selected')

                    {{-- add attribut action --}}
                    let url = "updateOption/" + value.id
                    formEdit.attr('action', url)
                    nom.val(value.nom)
                    value.niveau == "L1" ? niveau.eq(0).attr('selected', 'selected') :
                        value.niveau == "L2" ? niveau.eq(1).attr('selected', 'selected') :
                        value.niveau == "L3" ? niveau.eq(2).attr('selected', 'selected') :
                        value.niveau == "M1" ? niveau.eq(3).attr('selected', 'selected') :
                        value.niveau == "M2" ? niveau.eq(4).attr('selected', 'selected') :
                        niveau.removeAttr('selected')

                    $('select#mention_edit option[value=' + value.idmention + ']').attr('selected',
                        'selected')



                })
            })


        })

        {{-- stylejs pour dataTable --}}

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
