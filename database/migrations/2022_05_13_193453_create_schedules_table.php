<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('section_id');
            $table->foreign('section_id')->references('section_id')->on('sectionsgrades')->onDelete('cascade');
            $table->integer('subject_id');
            $table->foreign('subject_id')->references('subject_id')->on('subjectsgrades')->onDelete('cascade');
            $table->integer('period_id');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');
            $table->enum('day', ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
