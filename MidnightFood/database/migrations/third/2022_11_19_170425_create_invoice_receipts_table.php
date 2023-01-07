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
        Schema::create('invoice_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('code')->nulable(false)->unique();
            $table->unsignedInteger('user_id')->nulable(false);
            $table->dateTimeTz('issued_date')->nulable(false);
            $table->unsignedInteger('total')->nulable(false);
            $table->unsignedTinyInteger('status')->default(0);
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('invoice_receipts');
    }
};
