<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemainingCreditToAutoBiddingConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auto_bidding_configs', function (Blueprint $table) {
            $table->integer('used_credit')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auto_bidding_configs', function (Blueprint $table) {
            $table->dropColumn('used_credit');
        });
    }
}
