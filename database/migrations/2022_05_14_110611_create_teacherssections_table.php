<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('teacherssections', function (Blueprint $table) {
                $table->integer('teacher_id');
                $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
                $table->integer('section_id');
                $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
                $table->primary(['teacher_id', 'section_id']);
                $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teacherssections');
    }
};
