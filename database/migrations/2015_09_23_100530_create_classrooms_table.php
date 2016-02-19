
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            

            $table->increments('id');
            $table->integer('classroom_num')->unsigned();
            $table->string('name');
            //$table->integer('course_id')->unsigned();
            $table->string('slug');
            $table->integer('max_size');
            $table->timestamps();

            
            // $table->foreign('course_id')
            //     ->references('id')
            //     ->on('courses')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classrooms');
    }
}
