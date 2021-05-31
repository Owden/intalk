<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists("invoice_items");
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('amount');
            $table->integer('price');

            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('item_id')->references('id')->on('goods_and_services');
        });

        /*Trigger*/
        DB::statement(
            DB::raw('
            CREATE TRIGGER remove_goods_from_stock AFTER INSERT
            ON invoice_items FOR EACH ROW
            BEGIN
                DECLARE old_amount INTEGER;

                IF ((SELECT type FROM goods_and_services WHERE id=NEW.item_id) = "G") THEN
                    SET @old_amount := (SELECT amount FROM goods_and_services WHERE id=NEW.item_id);
                    UPDATE goods_and_services SET amount=@old_amount-NEW.amount WHERE id=NEW.item_id;
                END IF;
            END;'
            )
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
            DB::raw('DROP TRIGGER IF EXISTS remove_goods_from_stock;')
        );
        Schema::dropIfExists('invoice_items');
    }
}
