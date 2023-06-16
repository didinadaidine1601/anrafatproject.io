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
        //sSchema::disableForeignKeyConstraints();
        Schema::create('options', function (Blueprint $col) {
            $col->id();
            $col->string('nom')->default('GL');
            $col->string('niveau')->default('M2');
            $col->unsignedBigInteger('_idmention');
            $col->foreign('_idmention')
            ->references('id')
            ->on('mentions')
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
        Schema::dropIfExists('options');
    }
};
