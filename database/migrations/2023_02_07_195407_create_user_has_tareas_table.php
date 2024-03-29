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
        Schema::create('user_has_tareas', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('tarea_user_id');
                $table->foreign('tarea_user_id')
                ->references('user_id')
                ->on('user_has_proyectos');

                $table->unsignedBigInteger('tarea_id');
                $table->foreign('tarea_id')
                ->references('id')
                ->on('tareas')
                ->onDelete('cascade');
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
        Schema::dropIfExists('user_has_tareas');
    }
};
