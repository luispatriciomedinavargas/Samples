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
        Schema::table('samples', function (Blueprint $table) {
     
        $table->unsignedBigInteger('group_id')->nullable();
        $table->foreign('group_id')->references('id')->on('groups');
        $table->unsignedBigInteger('type_id')->nullable();
        $table->foreign('type_id')->references('id')->on('types');
        $table->unsignedBigInteger('gender_id')->nullable();
        $table->foreign('gender_id')->references('id')->on('genders');
        $table->unsignedBigInteger('sound_id')->nullable();
        $table->foreign('sound_id')->references('id')->on('sounds');
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
