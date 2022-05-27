<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('phone_number', 15);
            $table->string('name', 200);
            $table->string('email', 300);
            $table->string('password', 64);
            $table->timestamps();
        });

    Teacher::create([
        'name' => ' عبادة دعدع',
        'phone_number' => '0987654321',
        'email' => 'obadaa@gmail.com',
        'password' => Hash::make('obadaa1234')
    ]);
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
