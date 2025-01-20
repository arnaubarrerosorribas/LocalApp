<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('name');                             // Nombre 

            $table->string('email')->unique();                  // Email
            $table->timestamp('email_verified_at')->nullable(); // Verificación de Email

            $table->string('phone', 15);                        // Teléfono
            $table->timestamp('phone_verified_at')->nullable(); //Verificación de Telefono

            $table->string('password');                         // Contraseña
            $table->string('street_address');                   // Calle y número
            $table->string('ciudad');                           // Ciudad
            $table->string('provincia');                        // Provincia
            $table->integer('codigo_postal');                   // Código postal
            $table->integer('numero_planta')->nullable();       // Numero de la planta
            $table->integer('numero_puerta')->nullable();       // Numero puerta

            $table->unsignedBigInteger('categorias_generales');
            $table->foreign('categorias_generales')->references('id')->on('categorias_generales')->onDelete('cascade');

            $table->string('descripcion');                      // Descripcion tienda
            $table->boolean('gestion_stock');                   // Quiere gestion de Stock?
            $table->float('puntaje_medio');                     // Puntuación media de tienda
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
