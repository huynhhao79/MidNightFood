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
        Schema::create('invoice_receipt_details', function (Blueprint $table) {
            $table->unsignedInteger('receipt_id')->nullable(false);
            $table->unsignedInteger('product_id')->nullable(false);
            $table->unsignedInteger('quantity')->default(1);
            $table->unsignedInteger('receipt_price')->nullable(false);
            $table->softDeletes();

            $table->primary(['receipt_id', 'product_id']);
            $table->foreign('receipt_id')->references('id')->on('invoice_receipts');
            $table->foreign('product_id')->references('id')->on('products');
            $table->rememberToken();
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
        Schema::dropIfExists('invoice_receipt_details');
    }
};
