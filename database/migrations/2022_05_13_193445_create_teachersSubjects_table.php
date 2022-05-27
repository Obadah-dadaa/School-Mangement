<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('teachersSubjects', function (Blueprint $table) {
            $table->integer('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->integer('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->primary(['teacher_id', 'subject_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachersSubjects');
    }
}
