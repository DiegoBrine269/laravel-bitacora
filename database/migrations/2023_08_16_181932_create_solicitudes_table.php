<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->integer('eco');
            $table->integer('km');
            $table->string('persona', 50);
            $table->bigInteger('fallas_id')->unsigned()->index()->nullable();
            $table->foreign('fallas_id')->references('id')->on('fallas')->onDelete('cascade');
            $table->string('descripcion')->nullable();
            $table->bigInteger('mecanicos_id')->unsigned()->index()->nullable();
            $table->foreign('mecanicos_id')->references('id')->on('mecanicos')->onDelete('cascade');
            $table->float('calificacion', 2, 1)->nullable();
            $table->string('comentarios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
