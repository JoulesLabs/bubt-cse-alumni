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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->index();
            $table->foreignId('organization_id');
            $table->tinyInteger('type')->comment('1: full time, 2: part time, 3: contract, 4: temporary');
            $table->boolean('is_remote_allowed')->default(false);
            $table->integer('max_salary')->default(0);
            $table->tinyInteger('currency')->default(1);
            $table->string('location', 200)->nullable();
            $table->text('description')->nullable();
            $table->string('external_link', 250)->nullable();
            $table->tinyInteger('status')->default(1)->comment('1: draft, 2: published, 3: archived');
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
        Schema::dropIfExists('jobs');
    }
};
