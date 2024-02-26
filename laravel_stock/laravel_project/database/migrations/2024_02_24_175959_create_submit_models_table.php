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
        Schema::create('submit_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stock');
            $table->string('box_count');
            $table->text('details');
            $table->datetime('receive_date');
            //$table->timestamp('time')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit_models');
    }
};
