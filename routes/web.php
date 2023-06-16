<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\MentionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\NotesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome')->name('racine');

Route::get('/bulletin',BulletinController::class);
Route::get('/notes',[NoteController::class,'index']);


/*
|
|routre admin
*/
Route::prefix('admin')->group(function (){


        Route::get('/utilisateur',[UserController::class,'index'])->name('homeuser');

        Route::post('/adduser',[UserController::class,'store'])->name('ajout_user');

        Route::get('/getAlluser',[UserController::class,'create'])->name('fetch_user');

        Route::delete('/deleteuser/{user}',[UserController::class,"destroy"])->name('deluser');
        Route::get('/editUser/{user}',[UserController::class,"edit"])->name('edituser');
        Route::get('/getUSerByid/{user}',[UserController::class,"show"])->name('getuserByid');

        Route::put('/updateuser/{user}', [UserController::class,"update"])->name('updateuser');
});
//matiere
Route::prefix('admin')->group(function (){

        Route::get('/matiere',[MatiereController::class,'index'])->name('homematiere');
        Route::post('/addmatiere', [MatiereController::class,'store'])->name("ajout_matiere");
        Route::delete('/deletematiere/{matiere}', [MatiereController::class,'destroy'])->name("delete_matiere");
        Route::put('/updatematiere/{matiere}', [MatiereController::class,'update'])->name("updateMatiere");
        Route::get('/getMatiere/{matiere}', [MatiereController::class,'edit'])->name("getMatiereByid");

});
//mention
Route::prefix('admin')->group(function (){

        Route::get('/mention',[MentionController::class,'index'])->name('homemention');
        Route::post('/addmention', [MentionController::class,'store'])->name("ajout_mention");
        Route::delete('/deletemention/{mention}', [MentionController::class,'destroy'])->name("delete_mention");
        Route::put('/updatemention/{mention}', [MentionController::class,'update'])->name("updateMention");
        Route::get('/getMention/{mention}', [MentionController::class,'edit'])->name("getMentionByid");

});
//route pour les option

Route::prefix('admin')->group(function (){

        Route::get('/option',[OptionController::class,'index'])->name('homoption');
        Route::post('/addoption', [OptionController::class,'store'])->name("add-option");
        Route::delete('/deleteoption/{option}', [OptionController::class,'destroy'])->name("del_option");
        Route::put('/updateOption/{option}', [OptionController::class,'update'])->name("updateoption");
        Route::get('/getOption/{option}', [OptionController::class,'edit'])->name("getoptionbyID");
});
//route pour les notes

Route::prefix('admin')->group(function (){

        Route::get('/note',[NotesController::class,'index'])->name('homenote');
        Route::post('/addnote', [NotesController::class,'store'])->name("add-note");
        Route::delete('/deletenote/{note}', [NotesController::class,'destroy'])->name("del_note");
        Route::put('/updatenote/{note}', [NotesController::class,'update'])->name("updatenote");
        Route::get('/getNote/{note}', [NotesController::class,'edit'])->name("getnotebyID");
        Route::get('/getEtdByid/{id}', [NotesController::class,'getEtdByid']);
});








