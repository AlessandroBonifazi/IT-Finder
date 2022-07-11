<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("contacts", function (Blueprint $table) {
            $table->id();
            $table
                ->string("contact_email")
                ->default("")
                ->nullable();
            $table
                ->string("phone")
                ->default("")
                ->nullable();
            $table
                ->string("linkedin")
                ->default("")
                ->nullable();
            $table
                ->string("github")
                ->default("")
                ->nullable();
            $table
                ->string("site")
                ->default("")
                ->nullable();
            $table->timestamps();

            $table->unsignedBigInteger("user_id");
            $table
                ->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("contacts");
    }
}
