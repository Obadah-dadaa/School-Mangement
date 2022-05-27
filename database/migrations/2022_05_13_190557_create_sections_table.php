<?php

use App\Models\Section;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('number');
            $table->timestamps();
        });
        Section::create([
            'number' => '1',
        ]);
        Section::create([
            'number' => '2',
        ]);
        Section::create([
            'number' => '3',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
