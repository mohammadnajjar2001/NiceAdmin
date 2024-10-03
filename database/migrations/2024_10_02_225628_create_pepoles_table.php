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
        Schema::create('pepoles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',10)->default('mohammed');
            $table->string('last_name',10)->default('najjar');
            $table->enum('gender',['Male','Female']);
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('pepoles');
    }
};
