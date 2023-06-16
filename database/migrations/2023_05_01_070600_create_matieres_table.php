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

        Schema::create('matieres', function (Blueprint $col) {
            $col->id();
            $col->string("nom")->default('php');
            $col->integer("volume_horaire")->default(30);
            $col->unsignedBigInteger("_iduser");
            $col->foreign('_iduser')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        //Schema::dropIfExists('matieres');
    }
};
