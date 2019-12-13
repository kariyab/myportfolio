<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('answer');
<<<<<<< HEAD
            $table->unsignedBigInteger('bbs_id');
=======
            $table->unsignedInteger('bbs_id');
>>>>>>> f0c6694558c8956c26b42b0010b4d3c83d5c6a95
            
            $table->timestamps();
            
            $table->foreign('bbs_id')->references('id')->on('bbs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
