<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Grade;
class CreateGradesTable extends Migration
{
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('number');
            $table->timestamps();
        });
        Grade::create([
            'number' => '7',
        ]);
        Grade::create([
            'number' => '8',
        ]);
        Grade::create([
            'number' => '9',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
