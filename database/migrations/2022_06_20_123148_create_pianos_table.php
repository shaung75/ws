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
        Schema::create('pianos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained();
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
            $table->string('model');
            $table->string('colour');
            $table->string('finish');
            $table->string('serial_number')->unique();
            $table->string('stock_number')->unique();
            $table->string('year_of_manufacture');
            $table->boolean('ivory_keys')->default(0)->nullable();
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
        Schema::dropIfExists('pianos');
    }
};
