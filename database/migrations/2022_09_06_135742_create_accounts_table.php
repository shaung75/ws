<?php

use App\Models\Account;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->string('tax_rate')->nullable();
            $table->string('invoice_prefix')->nullable();
            $table->string('invoice_suffix')->nullable();
            $table->text('payment_details')->nullable();
            $table->text('invoice_footer')->nullable();
            $table->timestamps();
        });

        Account::create([
            'account_name' => 'White & Sentance Ltd',
            'tax_rate' => 20,
            'invoice_prefix' => 'WSL',
        ]);

        Account::create([
            'account_name' => 'White & Sentance',
            'tax_rate' => 0,
            'invoice_prefix' => 'WS',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
