<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uf',2);
            $table->string('cep',10);
            $table->string('cidade',35);
            $table->string('rua',35);
            $table->integer('numero');
            $table->string('complemento',30)->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('long', 10, 7)->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
