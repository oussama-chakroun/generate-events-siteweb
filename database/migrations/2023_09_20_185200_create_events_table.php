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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('primary_color');
            $table->string('secendary_color');
            $table->string('btn_acc')->nullable();
            $table->string('btn_pro')->nullable();
            $table->string('btn_red')->nullable();
            $table->string('btn_epo')->nullable();
            $table->string('btn_x_pc')->nullable();
            $table->string('btn_y_pc')->nullable();
            $table->string('btn_x_mobile')->nullable();
            $table->string('btn_y_mobile')->nullable();
            $table->string('logo')->nullable();
            $table->string('header');
            $table->string('thumbnail_pc');
            $table->string('thumbnail_mobile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
