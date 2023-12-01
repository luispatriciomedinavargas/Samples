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
        Schema::create('playlist_samples', function (Blueprint $table) {

            $table->unsignedBigInteger('playlist_id');
            $table->unsignedBigInteger('samples_id');
            $table->foreign('playlist_id')->references('id')->on('playlists');
            $table->foreign('samples_id')->references('id')->on('samples');
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
