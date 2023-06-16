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
        Schema::create('users', function (Blueprint $col) {
            $col->id();
            $col->unsignedBigInteger('matricule')
            ->unique()
            ->unsigned();
            $col->string('nom');
            $col->string('prenom');
            $col->string('profession');
            $col->string('telephone')->unique();
            $col->string('email')->unique();
            $col->timestamp('email_verified_at')->nullable();
            $col->string('password');
            $col->unsignedBigInteger('option')->default(0);
            $col->integer('status')->default(0);
            $col->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
