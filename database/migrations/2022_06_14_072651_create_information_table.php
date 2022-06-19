<?php

use App\Enums\AlumniRole;
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
            $table->tinyInteger('intake');
            $table->tinyInteger('shift');
            $table->integer('passing_year')->nullable();
            $table->string('university_id')->nullable();
            $table->string('designation', 50)->nullable();
            $table->string('alumni_role')->default(AlumniRole::member);
            $table->foreignId('company_id')->nullable();
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
        Schema::dropIfExists('information');
    }
};
