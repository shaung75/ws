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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('business_address1');
            $table->string('business_address2')->nullable();
            $table->string('business_town');
            $table->string('business_county');
            $table->string('business_postcode');
            $table->string('business_telephone');
            $table->string('business_email');
            $table->integer('tax_rate');
            $table->string('invoice_prefix')->nullable();
            $table->string('invoice_suffix')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
