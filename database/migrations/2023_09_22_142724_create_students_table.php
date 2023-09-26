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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
           $table->string("nom");
           $table->string("prenom");
           $table->string("email");
           $table->string("mobile");
           $table->unsignedBigInteger("filiere_id");
           $table->timestamps();
            
           $table->foreign("filiere_id")->references("id")->on("filieres");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
