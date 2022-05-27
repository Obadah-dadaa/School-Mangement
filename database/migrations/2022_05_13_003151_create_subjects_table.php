<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Subject;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name');
            $table->timestamps();
        });
        Subject::create([
            'name' => 'اللغة العربية',
        ]);
        Subject::create([
            'name' => 'رياضيات',
        ]);
        Subject::create([
            'name' => 'علم أحياء',
        ]);
        Subject::create([
            'name' => 'فيزياء وكيمياء',
        ]); Subject::create([
            'name' => 'تاريخ ',
        ]); Subject::create([
            'name' => 'جغرافية',
        ]); Subject::create([
            'name' => 'تربية قومية',
        ]); Subject::create([
            'name' => 'اللغة الانكليزية',
        ]); Subject::create([
            'name' => 'اللغى الفرنسية',
        ]); Subject::create([
            'name' => 'فنون',
        ]); Subject::create([
            'name' => 'موسيقا',
        ]); Subject::create([
            'name' => 'تربية رياضية',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};
