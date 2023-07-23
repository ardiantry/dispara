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
        Schema::create('event_recents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tamu_id');
            $table->unsignedBigInteger('event_id');
            $table->timestamp('visited_at')->nullable();
            $table->timestamps();

            // Definisikan foreign key constraint
            $table->foreign('tamu_id')->references('id')->on('buku_tamus')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_recents');
    }
};
