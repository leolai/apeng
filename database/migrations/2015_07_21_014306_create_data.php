<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datas', function(Blueprint $table)
		{
		  $table->increments('id');
		  $table->string('transform');//转化
		  $table->string('price');//价格
		  $table->string('income');//收入
		  $table->timestamps();//增加created_at updated_at两个字段
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
