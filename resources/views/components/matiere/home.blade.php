@extends('components.app')

@section('content')
    <div class="row mt">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-sm-12">
            <h4 class="center">
                </i>{{ __('Gestion de matiere') }}
            </h4>
            <div class="row">
                <!-- /col-md-12 -->
                <div class="col-md-12 col-lg-12 mt">
                    <!-- **********************************************
                                                composant pour un tableau de donnée
                                            ***************************************************-->
                    <x-matiere.datasource titre="Liste des matieres" :list="$matiere" />
                    <!-- **********************************************
                                             composant pour le formulaire d'ajout des donnée
                                            ***************************************************-->
                    <x-matiere.form-add titres="Formulaire d'ajout des matieres" :listProf="$listprof" />

                    <!-- **********************************************
                                                composant pour le formulaire d'edition des donnée
                                            ***************************************************-->
                    <x-matiere.form-edite titre="Formulaire d'édition" :listProf="$listprof" />

                </div>
                <!-- /col-md-12 -->
            </div>

        </div>
    </div>
@endsection



@section('styleJs')
    <script type="text/javascript" language="javascript"
        src="{{ asset('lib/advanced-datatable/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/advanced-datatable/js/DT_bootstrap.js') }}"></script>


    <script>
        $(() => {
            let btn_add = $("#btn_add");
            let blocData = $('#datasource');
            let blocForm = $('#formAdd');
            let btn_close = $('#btn_close');
            let btn_close_edit = $('#btn_close_edit');
            let blocEdite = $('#formEdite');

            let index = []; //un tableau temporaire qui va containir tous les id des matieres
            @foreach ($matiere as $item)
                index.push({
                    "id": {{ $item->id }},
                    "iduser": {{ $item->_iduser }}
                }) //ajoute tous les id sur le tableau index
            @endforeach

            btn_add.on('click', () => {
                blocData.fadeToggle(0, "linear"); //permet de caché le bloc
                blocForm.show(); // permet d'afficher le bloc


            });


            btn_close.on('click', () => {
                blocData.show();
                blocForm.hide();
            })

            btn_close_edit.on('click', () => {
                blocData.show();
                blocEdite.hide();
                $(`select#iduser_edit option`).removeAttr('selected')

            })

            index.map((value, index) => {



                let btn_edit = $('#btn_edit' + value.id);
                btn_edit.on('click', () => {
                    event.preventDefault()
                    blocData.hide();
                    blocEdite.show();


                    //selecteur pour le formulaire edit

                    let nom = $('input#nom_edit')
                    let vh = $('input#volume_horaire_edit')





                    //req ajax
                    let url = `getMatiere/${value.id}`
                    $.get(url, (result) => {
                        nom.val(result.nom)
                        vh.val(result.volume_horaire)
                        let iduser = result._iduser
                        $(`select#iduser_edit option`).removeAttr('selected')
                        $(`select#iduser_edit option[value=${value.iduser}]`).attr(
                            'selected', 'selected')
                        $('form#formeditmatiere').attr("action", "updatematiere/" + value
                            .id)

                        //on va attribuer l'action du formulaire
                    })
                })
            })


            {{-- style js pour dataTable --}}
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




        })
    </script>
@endsection
