<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
      //assignement de masse 
   protected $fillable =[
    "_idmatiere",
    "note",
    "_idUser",
    "_idOption",
    "coefficient"
];
}
