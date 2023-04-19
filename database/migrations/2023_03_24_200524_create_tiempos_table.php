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
        Schema::create('tiempos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('inicio');
            $table->double('accu')->default(0);
            $table->unsignedBigInteger('tarea_id');
            $table->foreign('tarea_id')
                ->references('id')
                ->on('tareas')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiempos');
    }
};
