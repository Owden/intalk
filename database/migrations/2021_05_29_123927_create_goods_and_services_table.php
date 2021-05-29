<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsAndServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_and_services', function (Blueprint $table) {
            $table->id();
            $table->string('type', 1);
            $table->string('name');
            $table->integer('price');
            $table->integer('amount');
        });

        DB::statement(DB::raw('ALTER TABLE goods_and_services ADD CONSTRAINT s_or_g CHECK (type IN ("S", "G"));'));
        DB::statement(DB::raw("ALTER TABLE goods_and_services ADD CONSTRAINT price_can_not_be_negative_or_zero
                    CHECK (price > 0 );"));
        DB::statement(DB::raw("ALTER TABLE goods_and_services ADD CONSTRAINT amount_can_not_be_negative
                    CHECK (amount >= 0 );"));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement(DB::raw('ALTER TABLE goods_and_services DROP CONSTRAINT s_or_g;'));
        DB::statement(DB::raw('ALTER TABLE goods_and_services DROP CONSTRAINT price_can_not_be_negative_or_zero;'));
        DB::statement(DB::raw('ALTER TABLE goods_and_services DROP CONSTRAINT amount_can_not_be_negative;'));
        Schema::dropIfExists('goods_and_services');
    }
}
