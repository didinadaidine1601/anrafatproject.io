<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\StoreNotesRequest;
use App\Http\Requests\UpdateNotesRequest;


class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
        $data=Notes::selectRaw('notes.*,users.nom as nom_etd,users.prenom as prenom_etd,
        options.nom as classe,options.niveau,
        matieres.nom as matiere, matieres.volume_horaire,matieres._iduser as idenseignant')
        ->join('users',"notes._idUser","users.id")
        ->join('matieres','notes._idmatiere','matieres.id')
        ->join('options','notes._idOption','options.id')
        ->get();


        return view('components.note.home',["note"=>$data]);

      
        } catch (\Throwable $th) {
            return view('partials.error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotesRequest $request)
    {
        try {
            Notes::create([
                "_idmatiere"=>$request->_idmatiere,
                "note"=>$request->note,
                "_idUser"=>$request->_idUser,
                "_idOption"=>$request->_idOption,
                "coefficient"=>$request->coefficient

            ]);
          
            return response()->json(["message"=>true]);

        } catch (\Throwable $th) {
            return response()->json([
                "message"=>false
            ]);
        }
     
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function getEtdByid($id)
    {
        try {
            $data=User::selectRaw('users.*')
            ->where('profession',"Etudiant")
            ->where('id',$id)
            ->get();
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                "error"=>"server error"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotesRequest  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotesRequest $request, Notes $note)
    {
       try {
            DB::update('UPDATE notes SET _idmatiere=?,note=?,_idUser=?,_idOption=?,coefficient=? WHERE id=?', 
            [
                $request->matiere,
                $request->note,
                $request->idUser,
                $request->classe,
                $request->coefficient,
                $note->id,
            ]);

        return redirect('admin/note');
       } catch (\Throwable $th) {
         return redirect('admin/note');
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy($notes)
    {
        try {
            DB::delete('delete from notes where id = ?', [$notes]);
            return redirect('admin/note');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('admin/note');

        }
       
    }
}
