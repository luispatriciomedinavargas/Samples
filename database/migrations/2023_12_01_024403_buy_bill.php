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
        Schema::create('buy_details', function (Blueprint $table) {

            $table->unsignedBigInteger('buy_id');
            $table->unsignedBigInteger('sample_id');
            $table->foreign('buy_id')->references('id')->on('buys');
            $table->foreign('sample_id')->references('id')->on('samples');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_details');
    }
};
