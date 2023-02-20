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
        Schema::create('epikkamsgs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('email',70);
            $table->string('telefono',25);
            $table->string('mensaje',350);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epikkamsgs');
    }
};
