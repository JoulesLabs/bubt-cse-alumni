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
        Schema::create('member_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referer_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->index();
            $table->tinyInteger('intake');
            $table->tinyInteger('shift');
            $table->string('referer_note')->nullable();
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
        Schema::dropIfExists('member_requests');
    }
};
