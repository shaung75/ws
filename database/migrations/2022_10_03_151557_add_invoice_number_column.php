<?php

use App\Models\Invoice;
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

        Schema::table('invoices', function (Blueprint $table) {
            $table->string('invoice_number')->after('account_id');
        });
       
        $invoices = Invoice::get();

        $i = 1;

        foreach($invoices as $invoice) {
            $invoice->invoice_number = $i;
            $invoice->save();
            $i++;
        }       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('invoice_number');
        });
    }
};
