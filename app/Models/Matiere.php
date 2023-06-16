<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    //assignement de masse 
   protected $fillable =[
        "nom",
        "volume_horaire",
        "_iduser"
   ];
}
