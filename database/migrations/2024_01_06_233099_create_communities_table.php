<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('ownedByUserID')->constrained('users');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('communities');
    }
};