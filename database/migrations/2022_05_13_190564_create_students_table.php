<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Student;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('first_name', 200);
            $table->string('last_name', 200);
            $table->integer('parent_id');
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
            $table->integer('section_id');
            $table->foreign('section_id')->references('section_id')->on('sectionsgrades')->onDelete('cascade');
            $table->timestamps();
        });
        Student::create([
            'first_name' => 'ديالا',
            'last_name' => 'نصار',
            'parent_id' => '1',
            'section_id' => '1',

        ]);
        Student::create([
            'first_name' => 'الياس',
            'last_name' => 'نصار',
            'parent_id' => '1',
            'section_id' => '1',

        ]);
        Student::create([
            'first_name' => 'قمر',
            'last_name' => 'الشحف',
            'parent_id' => '2',
            'section_id' => '1',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
