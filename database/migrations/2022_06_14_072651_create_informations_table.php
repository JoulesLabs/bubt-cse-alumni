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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('referer_id')->nullable();
            $table->tinyInteger('intake');
            $table->tinyInteger('shift');
            $table->dateTime('passing_year')->nullable();
            $table->string('university_id')->nullable();
            $table->string('current_job_designation', 50)->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->string('lives', 50)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('linkedin', 100)->nullable();
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
        Schema::dropIfExists('informations');
    }
};
