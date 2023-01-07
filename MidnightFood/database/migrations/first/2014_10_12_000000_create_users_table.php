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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 20)->nulable(false)->unique();
            $table->string('password')->nulable(false);
            $table->string('email')->nulable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 10)->nulable(false);
            $table->string('address')->nulable(false);
            $table->string('fullname', 50);
            $table->boolean('is_admin')->default(false);
            $table->softDeletes();

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
        Schema::dropIfExists('users');
    }
};
