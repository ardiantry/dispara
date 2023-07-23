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
        Schema::create('tamu_post_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tamu_id');
            $table->unsignedBigInteger('wisata_id');
            $table->timestamp('visited_at')->nullable();
            $table->timestamps();

            // Definisikan foreign key constraint
            $table->foreign('tamu_id')->references('id')->on('buku_tamus')->onDelete('cascade');
            $table->foreign('wisata_id')->references('id')->on('wisatas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamu_post_visits');
    }
};
