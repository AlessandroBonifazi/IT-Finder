<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->string("name", 30)->nullable();
            $table->string("img_path", 100)->nullable();
            $table->string("surname", 50)->default("");
            $table->string("user_name", 30)->nullable();
            $table->string("location", 50)->nullable();
            $table->string("position", 50)->nullable();
            $table->string("email")->unique();
            $table->string("password");
            $table->text("cv")->nullable();
            $table->tinyInteger("job_experience")->nullable();
            $table->timestamp("email_verified_at")->nullable();
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
        Schema::dropIfExists("users");
    }
}
