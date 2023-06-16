<?php

namespace App\Http\Controllers;

use App\Models\Mention;
use App\Http\Requests\StoreMentionRequest;
use App\Http\Requests\UpdateMentionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class MentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data=Mention::selectRaw('mentions.*')->get();
            return view('components.mention.home',["mention"=>$data]);
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
     * @param  \App\Http\Requests\StoreMentionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMentionRequest $request)
    {
        try {
            DB::insert('insert into mentions (nom) values (?)', [Str::upper($request->nom)]);
            return redirect('admin/mention');
        } catch (\Throwable $th) {
            return redirect('admin/mention');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function show(Mention $mention)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function edit(Mention $mention)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMentionRequest  $request
     * @param  \App\Models\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMentionRequest $request, Mention $mention)
    {
        try {
            DB::update('update mentions set nom = ? where id = ?', [Str::upper($request->nom),$mention->id]);
            return redirect('admin/mention');
        } catch (\Throwable $th) {
            return redirect('admin/mention');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mention  $mention
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mention $mention)
    {
        try {
            $mention->delete();
            return redirect('admin/mention');
        } catch (\Throwable $th) {
            return redirect('admin/mention');
        }
    }
}
