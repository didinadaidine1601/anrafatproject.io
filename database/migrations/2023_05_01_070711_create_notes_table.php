<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::disableForeignKeyConstraints();

        Schema::create('notes', function (Blueprint $col) {
            $col->id();
            $col->unsignedBigInteger('_idmatiere');// connaissant le nom de la matiere on peut deja connaitre le nom du prof
            $col->foreign('_idmatiere')
            ->references('id')
            ->on('matieres')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $col->integer('note')->default(00);
            $col->unsignedBigInteger('_idUser');//l'etudiant
            $col->foreign('_idUser')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $col->unsignedBigInteger('_idOption');
            $col->foreign('_idOption')
            ->references('id')
            ->on('options')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $col->integer('coefficient')->default(3);
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
