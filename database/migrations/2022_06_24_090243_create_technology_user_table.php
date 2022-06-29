<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnologyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("technology_user", function (Blueprint $table) {
            $table->unsignedBigInteger("user_id");
            $table
                ->foreign("user_id")
                ->unsigned()
                ->references("id")
                ->on("users");

            $table->unsignedBigInteger("technology_id");
            $table
                ->foreign("technology_id")
                ->unsigned()
                ->references("id")
                ->on("technologies");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("technology_user");
    }
}
