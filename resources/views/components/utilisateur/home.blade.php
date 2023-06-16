@extends('components.app')
@section('content')
    <div class="row mt">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-sm-12">
            <h4 class="center">
             
                </i>{{ __("Gestion d'utilisateur") }}

            </h4>
            <div class="row">
                <!-- /col-md-12 -->
                <div class="col-md-12 col-lg-12 mt">
                    <!-- **********************************************
                        composant pour un tableau de donnée
                    ***************************************************-->
                    <x-utilisateur.datasource titre="Listes d'utilisateur" :list="$data" />

                    <!-- **********************************************
                     composant pour le formulaire d'ajout des donnée
                    ***************************************************-->
                    <x-utilisateur.form-add titre="Ajout des Utilisateur" />

                    <!-- **********************************************
                        composant pour le formulaire d'ajout des donnée
                    ***************************************************-->
                    <x-utilisateur.form-edit titre="Edition d'Utilisateur"/>
                </div>
                <!-- /col-md-12 -->
            </div>

        </div>
    </div>
@endsection


<!-- **********************************************
    section stylejs
***************************************************-->

@section('styleJs')
<script type="text/javascript" language="javascript"
src="{{ asset('lib/advanced-datatable/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/advanced-datatable/js/DT_bootstrap.js') }}"></script>

    <script>
        $(() => {

            let blocData = $('#datasource');
            let blocForm = $('#formAdd');
            let blocEditform = $('#formEdit');
            let btnAdd = $('#btn_add');
            let btnClose = $('#btn_close');
            let btnCloseEdit = $('#btn_close_edit');
            let btnDel = $('#btn_del');

            //lors d'un click sur le button ajouter
            btnAdd.on('click', () => {
                blocData.hide();
                blocForm.show();
            });

            //lors d'un click sur le button fermer
            btnClose.on('click', () => {
                blocData.show();
                blocForm.hide();
            })
            //lors d'un click sur le button editer
            let indexes = []
            @foreach ($data as $item)
                indexes.push({{ $item->id }})
            @endforeach

            for (let i = 0; i < indexes.length; i++) {

                let btnEdit = $('#btn_edit' + indexes[i]);

                //affiche
                btnEdit.on('click', () => {
                    let user = $('input#user' + indexes[i])

                    //on fait disparaitre le bloc qui contient le tableau et on va faire affiché le bloc qui contient le formulaire d'edition
                
                    blocData.hide();
                    blocEditform.show();
                    let url="editUser/"+indexes[i]
                    let urlupdate="updateuser/"+indexes[i]

                    //dom pour le formulaire edit
                    let nom=$('input#nom_edit');
                    let prenom=$('input#prenom_edit');
                    let matricule=$('input#matricule_edit');
                    let tel=$('input#telephone_edit');
                    let email=$('input#email_edit');
                    let profession=$('select#profession_edit option');
                    let password=$('input#password_edit');
                    let passwordconf=$('input#passwordconf_edit');

                    //on va interroger notre base avec des requette ajax
                    $.get(url,(result)=>{
                        let form=$('form#form_edituser')
                        form.attr('action',urlupdate)

                        let data=result.data;
                        //on va  parcourir ce tableau et on attribue chaque value sur son composant d'ihm correspondant
                        data.map((value, index) => {
                            nom.val(value.nom)
                            prenom.val(value.prenom)
                            tel.val(value.telephone)
                            matricule.val(value.matricule)
                            email.val(value.email)
                            value.profession==="Enseignant"?profession.eq(1).attr('selected',"selected")
                            :value.profession==="Etudiant"?profession.eq(0).attr('selected','selected')
                            :profession.eq(2).attr('selected','selected')

                        })

                    });
                });

                //close
                btnCloseEdit.on('click', () => {
                    blocData.show();
                    blocEditform.hide();
                })



            }
        });

    </script>


<script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
        var aData = oTable.fnGetData(nTr);
        var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
        sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
        sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
        sOut += '</table>';

        return sOut;
    }

    $(document).ready(function() {
        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement('th');
        var nCloneTd = document.createElement('td');
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

    {{-- stylejs pour data --}}
    $(document).ready(function() {
            /*
             * Insert a 'details' column to the table
             */
            var nCloneTh = document.createElement('th');
            var nCloneTd = document.createElement('td');
            nCloneTd.innerHTML = '';
            nCloneTd.className = "";

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
