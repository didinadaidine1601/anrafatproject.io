<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    use HasFactory;

    //assignement de masse
    protected $fillable = [
        'nom'
    ];
}
