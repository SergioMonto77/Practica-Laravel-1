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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->text('resumen');
            $table->decimal('pvp', 5, 2);
            $table->integer('stock');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //a partir de laravel 9 se debe de poner el constrained de esta forma
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
        Schema::dropIfExists('libros');
    }
};
