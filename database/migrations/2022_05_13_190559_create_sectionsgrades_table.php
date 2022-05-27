<?php

use App\Models\SectionsGrade;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsgradesTable extends Migration
{
    public function up()
    {
        Schema::create('sectionsgrades', function (Blueprint $table) {
            $table->integer('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->integer('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->primary(['grade_id', 'section_id']);
            $table->timestamps();
        });
        SectionsGrade::create([
            'grade_id' => '1',
            'section_id' => '1',

        ]);
        SectionsGrade::create([
            'grade_id' => '1',
            'section_id' => '2',
        ]);
        
    }

    public function down()
    {
        Schema::dropIfExists('sectionsgrades');
    }
}
