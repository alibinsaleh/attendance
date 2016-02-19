<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            

            $table->increments('id');

            $table->integer('student_id')->unsigned();
            

            $table->integer('course_id')->unsigned();

            $table->integer('week_id')->unsigned();
            

            $table->integer('checked_day')->unsigned();
            $table->integer('checked_month')->unsigned();
            $table->integer('checked_year')->unsigned();

            

            $table->integer('sunday')->unsigned();
            $table->integer('monday')->unsigned();
            $table->integer('tuesday')->unsigned();
            $table->integer('wednesday')->unsigned();
            $table->integer('thursday')->unsigned();


            $table->text('note');

            $table->timestamps();

            //Foreinkeys

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('week_id')
                ->references('id')
                ->on('weeks')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attendances');
    }
}
