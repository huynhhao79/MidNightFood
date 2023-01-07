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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->nulable(false)->unique();
            $table->string('name')->nulable(false);
            $table->string('decription')->nulable(false);
            $table->unsignedInteger('quantity')->nulable(false);
            $table->unsignedInteger('price')->nulable(false);
            $table->unsignedInteger('category_id')->index();
            $table->boolean('status')->default(true);
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
};
