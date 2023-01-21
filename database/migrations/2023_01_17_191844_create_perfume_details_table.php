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
        Schema::create('perfume_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perfume_id')->constrained()->cascadeOnDelete();
            $table->foreignId('perfume_size_id')->constrained()->cascadeOnDelete();
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfume_details');
    }
};
