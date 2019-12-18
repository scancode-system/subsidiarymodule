<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsItemProductsTableSubsidiary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_products', function (Blueprint $table) {
            $table->unsignedBigInteger('subsidiary_id')->nullable()->after('discount_limit');
            $table->foreign('subsidiary_id')->references('id')->on('subsidiaries')->onDelete('cascade')->onUpdate('cascade');
            $table->string('subsidiary_name')->nullable()->after('discount_limit');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_products', function (Blueprint $table) {
            $table->dropForeign(['subsidiary_id']);
            $table->dropColumn(['subsidiary_id', 'subsidiary_name']);
        });
    }
}
