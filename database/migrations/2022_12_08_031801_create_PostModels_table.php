<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PostModels', function (Blueprint $table) {
            $table->id();
            //$table->string('uuid',35)->unique();//유저id
            $table->string('title',250);//제목
            $table->text('content');//내용
            $table->timestamps();//글작성 시간
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PostModels');
    }
}
