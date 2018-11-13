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
            $table->boolean('status')->default(config('comments.show_immediately'));
            $table->timestamps();
        });
    }

    /** @return void */
    public function down()
    {
        Schema::dropIfExists('comments');
    }

}
