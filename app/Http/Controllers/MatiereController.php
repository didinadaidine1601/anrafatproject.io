<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $data=DB::select('SELECT matieres.id,matieres._iduser, matieres.nom as nom_mat, matieres.volume_horaire,
        users.nom as nom_esg,users.prenom as prenom_esg,users.matricule,users.email from matieres
        join users
        on matieres._iduser=users.id');

        $listprof=DB::select('select * from users where profession = ?', ["Enseignant"]);
        return view('components.matiere.home',["matiere"=>$data,"listprof"=>$listprof]);

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
     * @param  \App\Http\Requests\StoreMatiereRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatiereRequest $request)
    {
        try {
            Matiere::create([
                "nom"=>Str::upper($request->nom),
                "volume_horaire"=>$request->volume_horaire,
                "_iduser"=>$request->_iduser
            ]);
            return redirect('admin/matiere');
        } catch (\Throwable $th) {
            return redirect('admin/matiere');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {
        return response()->json($matiere);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatiereRequest  $request
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatiereRequest $request, Matiere $matiere)
    {

        try {
           DB::update('update   matieres set _iduser = ?, nom=?, volume_horaire=? where id = ?', [
            $request->_iduser,
            Str::upper($request->nom),
            $request->volume_horaire,
            $matiere->id]);
            return redirect('/admin/matiere');
        } catch (\Throwable $th) {
            return redirect('/admin/matiere');
        }
        dd($matiere);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        try {

            $matiere->delete();
            return redirect('admin/matiere');
        } catch (\Throwable $th) {
            return redirect('admin/matiere');
            
        }
    }
}
