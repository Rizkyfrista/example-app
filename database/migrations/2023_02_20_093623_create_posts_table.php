<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
  Schema::create('posts', function (Blueprint $table) {
     $table->id();
     $table->string('firstname');
     $table->string('lastname');
     $table->string('address');
     $table->string('city_state_zip');
     $table->integer('homephone');
     $table->integer('cellphone');
     $table->char('email');
     $table->string('appliedposition');
     $table->integer('expectedsalary');
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
        Schema::dropIfExists('posts');
    }
}
