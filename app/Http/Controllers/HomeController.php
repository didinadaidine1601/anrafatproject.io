<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tonga()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
 
        $this->matricule=Auth::user()['matricule'];
        $this->data=DB::select('select _options.nom as nomOP,
        _options.niveau as nvOP, _mentions.nom as ment,
        _matieres.nom as nomMat,_matieres.volume_horaire as volHeure,
        _emploi_du_temps._matricule as num_mat

        FROM _emploi_du_temps
        JOIN _options
        ON _options.id = _emploi_du_temps._id_option
        JOIN _mentions
        ON _options._id_mention =_mentions.id
        JOIN _matieres
        ON _matieres.id = _emploi_du_temps._id_matiere
        where _emploi_du_temps._matricule = ?', [$this->matricule]);
       
        $profiles=Profile::selectRaw('profiles.*')
        ->where(['matricule'=>$this->matricule])
        ->get();
        $profilesActu=Profile::selectRaw('profiles.*,users.nom as usernom,users.prenom')
        ->join('users','users.matricule','profiles.matricule')
        ->where(['profiles.matricule'=>$this->matricule,'profiles.status'=>1])
        ->get();
        return view('dashbord',array('data'=>$this->data,'profiles'=>$profiles,'profilesActu'=>$profilesActu));

    }


        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matricule= Auth::user()->matricule;

        switch ($request->choixprofiles) {
            case 'choixSelect':
                if ($request->hasFile('photo')) {
                    $nom=$request->file('photo')->getClientOriginalName()."_".time();
                    $extension=$request->file('photo')->getClientOriginalExtension();
                    $taille=$request->file('photo')->getSize();
                    
                    if ($request->file('photo')->isValid()) {
                        switch (Str::lower($extension)) {
                            case 'png':
                                $request->file('photo')->storeAs('public/images/',$nom);
                                $this->addProfiles($nom,$extension,$taille,$matricule);
                                return redirect('/home')
                                 ->with("success", "Votre profile a bien été Modifier avec succé");
                            case 'jpg':
                                $this->addProfiles($nom,$extension,$taille,$matricule);
                                $request->file('photo')->storeAs('public/images/',$nom);
                                return redirect('/home')
                                 ->with("success", "Votre profile a bien été Modifier avec succé");
                                break;
                            case 'jpeg':
                                $this->addProfiles($nom,$extension,$taille,$matricule);
                                $request->file('photo')->storeAs('public/images/',$nom);
                                return redirect('/home')
                                ->with("success", "Votre profile a bien été Modifier avec succé");
                           
                                default:
                            return redirect('/home')
                            ->with("error", "Le type de fichier envoyée est incorecte !!");
                                break;
                        }
                    }
                }
                break;
            case 'choixfiltre':
                 DB::update('update profiles set status = 0 where matricule = ?', [$matricule]);
                 DB::update('update profiles set status = 1 where matricule = ? and nom=?', [$matricule,$request->photofiltre]);
                 return redirect('/home')
                 ->with("success", "Votre profile a bien été Modifier avec succé");
                break;
            default:
                # code...
                break;
        }
       
       
    }

    public function getsata(Request $request){

       $data= DB::select('select * from users where matricule = ?', [$request->id]);
       return response()->json($data); 
    }

public function addProfiles($nom,$ext,$taille,$matricule)
{
    $profile=new Profile();
    $profile->nom=$nom;
    $profile->extension=$ext;
    $profile->taille=$taille;   
    $profile->matricule=$matricule;
    $profile->status=1;
    DB::update('update profiles set status = 0 where matricule = ?', [$matricule]);
    $profile->save();
}
}
