<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lang');
            $table->string('body');
<<<<<<< HEAD
=======
            $table->unsignedInteger('answer_count');
>>>>>>> f0c6694558c8956c26b42b0010b4d3c83d5c6a95
                
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
        Schema::dropIfExists('bbs');
    }
}
