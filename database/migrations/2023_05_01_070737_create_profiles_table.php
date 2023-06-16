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
       // Schema::disableForeignKeyConstraints();

        Schema::create('profiles', function (Blueprint $col) {
            $col->id();
            $col->string('image')->unique();
            $col->string('ext')->default('png');
            $col->integer('taille');
            $col->unsignedBigInteger('_iduser');
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
        Schema::dropIfExists('profiles');
    }
};
