<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultsTable extends Migration
{
    public function up()
    {
        Schema::create('consults', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('parent_id');
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
            $table->string('title', 200);
            $table->longText('description')->nullable();
            $table->smallInteger('rating')->default('0');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consults');
    }
}
