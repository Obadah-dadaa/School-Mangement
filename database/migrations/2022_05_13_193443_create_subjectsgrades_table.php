<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsgradesTable extends Migration
{
    public function up()
    {
        Schema::create('subjectsgrades', function (Blueprint $table) {
            $table->integer('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->integer('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->primary(['subject_id', 'grade_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjectsgrades');
    }
}
