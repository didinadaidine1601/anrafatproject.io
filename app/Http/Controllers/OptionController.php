<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Mention;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data=Option::selectRaw('options.*,mentions.nom as nom_mention')
            ->join("mentions","options._idmention","mentions.id")
            ->get();
            $mention=Mention::selectRaw("mentions.*")->get();
           return view('components.option.home',["option"=>$data,"mention"=>$mention]);
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
     * @param  \App\Http\Requests\StoreOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionRequest $request)
    {
        try {
            DB::insert('insert into options (nom,niveau,_idmention) values (?,?,?)', [Str::upper($request->nom),Str::upper($request->niveau),$request->mention]);
            return redirect('admin/option');
        } catch (\Throwable $th) {
            return redirect('admin/option');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOptionRequest  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionRequest $request, Option $option)
    {
        try {
            DB::update('update options set nom = ?,niveau=?,_idmention=? where id = ?', [Str::upper($request->nom),Str::upper($request->niveau),$request->mention,$option->id]);
            return redirect('admin/option');

        } catch (\Throwable $th) {
            return redirect('admin/option');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        try {
            $option->delete();
            return redirect('admin/option');

        } catch (\Throwable $th) {
            return redirect('admin/option');

        }
    }
}
