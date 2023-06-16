<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserREquest;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        try {
            $data=User::selectRaw('users.*')->get();
            return view('components.utilisateur.home',['data'=>$data]);
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserREquest $request)
    {
        $request->validated();
        try {
                
            User::create(
                [
                    'nom'=>Str::ucfirst($request->nom),
                    'prenom'=>Str::upper($request->prenom),
                    'matricule'=>$request->matricule,
                    'telephone'=>$request->telephone,
                    'profession'=>Str::ucfirst($request->profession),
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                ]
            );
            return redirect('admin/utilisateur');
        } catch (\Throwable $th) {
            return redirect('admin/utilisateur');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        try {
            $data=User::selectRaw('users.*')
            ->where('profession',"Etudiant")
            ->where('matricule',$user)
            ->get();
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                "error"=>"server error"
            ]);
        }
      
    }

    /**
     * Show user with id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $data=User::selectRaw('users.*')
        ->where('id',$user)
        ->get();
        return response()->json(["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        try {
            DB::update('UPDATE users SET matricule=?,nom=?,prenom=?,profession=?,telephone=?,email=?
           ,updated_at=NOW() WHERE id=?', [
            $request->matricule,
            Str::ucfirst($request->nom),
            Str::upper($request->prenom),
            Str::ucfirst($request->profession),
            $request->telephone,
            $request->email,
            $user]);

            return redirect('admin/utilisateur');

        } catch (\Throwable $th) {
            dd("catch");
            return redirect('admin/utilisateur');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect('admin/utilisateur');

        } catch (\Throwable $th) {
            return redirect('admin/utilisateur');
            
        }
    }
}
