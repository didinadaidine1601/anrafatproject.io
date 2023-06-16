<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notes;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notes::create([
            "_idmatiere"=>1,
            "note"=>16.5,
            "_idUser"=>8,
            "_idOption"=>1,
            "coefficient"=>5
        ]);
    }
}
