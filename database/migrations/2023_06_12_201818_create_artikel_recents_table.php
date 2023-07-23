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
        Schema::create('artikel_recents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tamu_id');
            $table->unsignedBigInteger('artikel_id');
            $table->timestamp('visited_at')->nullable();
            $table->timestamps();

            // Definisikan foreign key constraint
            $table->foreign('tamu_id')->references('id')->on('buku_tamus')->onDelete('cascade');
            $table->foreign('artikel_id')->references('id')->on('artikels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel_recents');
    }
};
