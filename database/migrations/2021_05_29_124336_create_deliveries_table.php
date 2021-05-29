<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists("deliveries");
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('delivered_good');
            $table->integer('amount');
            $table->timestamp('time_of_delivery');
            $table->integer('price');

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('delivered_good')->references('id')->on('goods_and_services');
        });

        /*Trigger*/
        DB::statement(
            DB::raw("
            CREATE TRIGGER add_delivered_goods_to_stock AFTER INSERT
            ON deliveries FOR EACH ROW
            BEGIN
                DECLARE old_amount INTEGER;

                SET @old_amount := (SELECT amount FROM goods_and_services WHERE id = NEW.delivered_good LIMIT 1);
                UPDATE goods_and_services SET amount = @old_amount + NEW.amount WHERE id = NEW.delivered_good;
            END;")
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement(
            DB::raw('DROP TRIGGER IF EXISTS add_delivered_goods_to_stock;')
        );
        Schema::dropIfExists('deliveries');
    }
}
