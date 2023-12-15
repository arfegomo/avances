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
        Schema::create('historias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesional_id')->nullable()->constrained('users');
            $table->foreignId('paciente_id')->nullable()->constrained('users');
            $table->boolean("estado")->default(false);
            $table->string("firma")->nullable();
            $table->text("antecedentes")->nullable();
            $table->text("evolucion")->nullable();
            $table->text("concepto")->nullable();
            $table->text("recomendaciones")->nullable();
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
        Schema::dropIfExists('historias');
    }
};
