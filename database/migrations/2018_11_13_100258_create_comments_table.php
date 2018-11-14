<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCommentsTable
 */
class CreateCommentsTable extends Migration
{

    /** @return void */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->integer('parent_id')->nullable();
            $table->timestamps();
            $table->integer(config('comments.key_field'))->unsigned();
            $table->foreign(config('comments.key_field'))->references('id')->on(config('comments.key_table'));

            if(config('comments.user')){
                $table->integer('user_id')->unsigned()->nullable();	//разрешаем null
                $table->foreign('user_id')->references('id')->on('users');
            }
        });
    }

    /** @return void */
    public function down()
    {
        Schema::dropIfExists('comments');
    }

}
