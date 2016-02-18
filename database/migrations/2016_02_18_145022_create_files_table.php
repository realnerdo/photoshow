<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned();
            $table->string('url');
            $table->timestamps();

            $table->foreign('gallery_id')
                    ->references('id')
                    ->on('galleries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function(Blueprint $table) {
            $table->dropForeign(['gallery_id']);
        });
        Schema::drop('files');
    }
}
