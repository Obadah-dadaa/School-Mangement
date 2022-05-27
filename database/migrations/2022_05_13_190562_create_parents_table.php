<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Parents;
use Illuminate\Support\Facades\Hash;

class CreateParentsTable extends Migration
{
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name', 200);
            $table->string('phone_number', 15);
            $table->string('address', 200);
            $table->string('email', 300);
            $table->string('password', 64);
            $table->rememberToken();
            $table->timestamps();
        });
    Parents::create([
            'name' => 'جود نصار',
            'phone_number' => '0987654321',
            'address' => 'sweida',
            'email' => 'joud@gmail.com',
            'password' => Hash::make('joud1234')
        ]);
        Parents::create([
            'name' => 'هنادي الشحف',
            'phone_number' => '0987654321',
            'address' => 'sweida',
            'email' => 'joud@gmail.com',
            'password' => Hash::make('joud1234')
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
