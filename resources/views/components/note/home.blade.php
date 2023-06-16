@extends('components.app')

{{-- section pour style css --}}

@section('stylecss')
@endsection

{{-- section pour le content --}}
@section('content')
    <div class="row mt">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-sm-12">

            <div class="row">
                <!-- /col-md-12 -->
                <div class="col-md-12 col-lg-12 mt">
                    <!-- **********************************************
                                                                                                                                                                composant pour un tableau de donnée
                                                                                                                                                            ***************************************************-->
                    <x-note.datasource titre="Gestion des notes" :list="$note" />
                    <!-- **********************************************
                                                                                                                                                             composant pour le formulaire d'ajout des donnée
                                                                                                                                                            ***************************************************-->
                    <x-note.forme-add titre="Formulaire d'ajout de notes" />

                    <!-- **********************************************
                                                                                                                                                                composant pour le formulaire d'edition des donnée
                                                                                                                                                            ***************************************************-->
                    <x-note.forme-edit titre="Formulaire d'edition de note" />
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
            const nom_etudiant = $('span#nom_etudiant')





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
                $('select#matiere_edit option').map((i, element) => {
                    let dom = $(element)
                    dom.removeAttr('selected')

                })

            })

            {{-- 
                ============================================
                 evenement lié au button edit
                ===========================================
            --}}
            let note = []
            @foreach ($note as $item)
                note.push({
                    "id": {{ $item->id }},
                    "matiere": {{ $item->_idmatiere }},
                    "note": {{ $item->note }},
                    "etudiant": {{ $item->_idUser }},
                    "classe": {{ $item->_idOption }},
                    "coefficient": {{ $item->coefficient }}
                })
            @endforeach
            note.map((value, index) => {

                {{-- button edit concatené avec id de la note --}}
                let btn_edit = $('button#btn_edit' + value.id)

                {{--
                    ========================================================================
                     lors du click sur le button edit 
                    ========================================================================
                     --}}
                btn_edit.on('click', function(event) {
                    event.preventDefault()
                    blocData.hide()
                    blocFormEdit.show()

                    {{-- attribué via jquery action du formulaire de modification --}}
                    $('form#formeditNote').attr('action', 'updatenote/' + value.id)

                    let selectMatiere = $('select#matiere_edit option');
                    selectMatiere.map((i, v) => {
                        let valueoption = parseInt($(v).val())

                        valueoption === value.matiere ?
                            $("select#matiere_edit option[value=" + valueoption + "]").attr(
                                "selected",
                                "selected") :
                            ""
                    })

                    let note_edit = $('input#notes_edit')
                    note_edit.val(value.note)
                    let matriculeEtudiant = $('input[name=idUser]')
                    matriculeEtudiant.val(value.etudiant)
                    selectmatricule(value.etudiant)
                    onChangematricule()
                    let coeff = $('input#coefficient')
                    coeff.val(value.coefficient)
                    let classe = $('select#classe option')
                    classe.map((ind, v) => {
                        let valueOPT = $(v).val()
                        value.classe === parseInt(valueOPT) ? $(v).attr('selected',
                            'selected') : ""

                    })
                })
            })

            let matriculeEtd = $('input#matricule_edit')


            {{-- 
                ===========================================================
                execute une requette pour recuperer les info
                ===========================================================
            --}}
            let onChangematricule = () => {
                matriculeEtd.change(function() {
                    let mat = matriculeEtd.val() ? matriculeEtd.val() : 0;
                    $.get(`getUSerByid/${mat}`, (result) => {
                        if (result.length) {
                            result.map((value, index) => {
                                nom_etudiant.text("" + value.nom + " " + value.prenom)
                                    .css({
                                        'color': 'black'
                                    })
                                matriculeEtd.css({
                                    'border': "",
                                    'color': ''
                                })

                                $('input[name=idUser]').val(value.id + "")
                            })
                        } else {
                            nom_etudiant.text("Aucun resultat lié au matricule " + matriculeEtd
                                .val()).css({
                                'color': 'red'
                            })
                            matriculeEtd.val("").css({
                                'color': 'red'
                            })
                            matriculeEtd.css({
                                'border': "1px solid red"
                            }).attr('placeholder', 'Aucun resultat')
                        }
                    })

                }).change()
            }

            const selectmatricule = (id) => {
                $('input[name=idUser]').change(function() {
                    let mat = $('input[name=idUser]').val() ? $('input[name=idUser]').val() : 0;
                    $.get(`getEtdByid/${id}`, (result) => {
                        if (result.length) {
                            result.map((value, index) => {
                                nom_etudiant.text("" + value.nom + " " + value.prenom)
                                    .css({
                                        'color': 'black'
                                    })
                                matricule.css({
                                    'border': ""
                                })

                                matriculeEtd.val(value.matricule + "")
                            })
                        } else {
                            nom_etudiant.text("").css({
                                'color': 'red'
                            })
                            matricule.css({
                                'border': "1px solid red"
                            }).attr('placeholder', 'Aucun resultat')
                        }
                    })

                }).change()

                matriculeEtd.change(function() {
                    let mat = matriculeEtd.val() ? matriculeEtd.val() : 0;
                    $.get(`getEtdByid/${mat}`, (result) => {
                        if (result.length) {
                            result.map((value, index) => {
                                nom_etudiant.text("" + value.nom + " " + value.prenom)
                                    .css({
                                        'color': 'black'
                                    })
                                matriculeEtd.css({
                                    'border': "",
                                    'color': ""
                                })

                                $('input[name=idUser]').val(value.id + "")
                            })
                        } else {

                            matriculeEtd.css({
                                'border': "1px solid red"
                            }).attr('placeholder', 'Aucun resultat')
                        }
                    })

                }).change()
            }
            {{-- evenement lie a chaque changement du matricule --}}

            const matricule = $('input#matricule')
            const iduser = $('input[name=idUser]')

            matricule.change(function() {
                let mat = matricule.val() ? matricule.val() : 0;
                $.get(`getUSerByid/${mat}`, (result) => {
                    if (result.length) {
                        result.map((value, index) => {
                            nom_etudiant.text("" + value.nom + " " + value.prenom).css({
                                'color': 'black'
                            })
                            matricule.css({
                                'border': ""
                            })

                            iduser.val(value.id + "")
                        })
                    } else {
                        nom_etudiant.text("").css({
                            'color': 'red'
                        })
                        matricule.css({
                            'border': "1px solid red"
                        }).attr('placeholder', 'Aucun resultat')
                    }
                })

            }).change()


            {{-- lors du click sur le button ajouter au liste --}}

            const btnAddlist = $('button#btnAddlist')
            const listchaine = $('tbody#listchaine')

            const matiere = $('select#matiere');
            const notes = $('input[type=number]#notes')
            const idusers = $('input[type=hidden][name=idUser]');
            const classe = $('select#classe');
            const coefficient = $('input#coefficient')


            let datasave = []
            btnAddlist.on('click', function(event) {
                event.preventDefault()

                const actionAdd = () => {
                    matricule.css({
                        'border': ""
                    })
                    matiere.css({
                        'border': ""
                    })
                    notes.css({
                        'border': ""
                    })
                    idusers.css({
                        'border': ""
                    })
                    classe.css({
                        'border': ""
                    })
                    coefficient.css({
                        'border': ""
                    })
                    datasave.push({
                        "_idmatiere": matiere.val(),
                        "note": notes.val(),
                        "_idUser": idusers.val(),
                        "_idOption": classe.val(),
                        "coefficient": coefficient.val()
                    })

                    listchaine.append('<tr>' +
                        '<td>' + nom_etudiant.text() + '</td>' +
                        '<td>' + $('select#matiere option[value=' + matiere.val() + ']').text() +
                        '</td>' +
                        '<td>' + notes.val() + '</td>' +
                        '<td>X</td>' +
                        '</tr>')
                }
                const preg = matricule.val() === "" ? "" :
                    matiere.val() === "" ? "" :
                    notes.val() === "" ? "" :
                    idusers.val() === "" ? "" :
                    classe.val() === "" ? "" :
                    coefficient.val() === "" ? "" : "valid"

                switch (preg) {
                    case "valid":
                        actionAdd()
                        break;
                    default:
                        matricule.val() === "" ? matricule.css({
                                'border': "1px solid red"
                            }) :
                            matiere.val() === "" ? matiere.css({
                                'border': "1px solid red"
                            }) :
                            notes.val() === "" ? notes.css({
                                'border': "1px solid red"
                            }) :
                            idusers.val() === "" ? idusers.css({
                                'border': "1px solid red"
                            }) :
                            classe.val() === "" ? classe.css({
                                'border': "1px solid red"
                            }) :
                            coefficient.val() === "" ? coefficient.css({
                                'border': "1px solid red"
                            }) : ""
                        break;
                }
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }
            });
            let btn_save = $('button#btn_save')
            btn_save.on('click', function(event) {
                event.preventDefault()
                //parcourir les donnés
                datasave.map((value, index) => {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('add-note') }}",
                        data: value,
                        success: (result) => {
                            if (result.message) {
                                blocData.show()
                                blocFormAdd.hide()
                                window.location.reload()
                            }
                        },
                    });

                })


            })


        })



        {{-- stylejs du dataTable --}}

        
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
