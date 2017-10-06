<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',200);
            $table->text('descricao');
            $table->date('dt_evento');
            $table->string('hr_evento',20);
            $table->string('local',60);
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
        Schema::dropIfExists('agenda');
    }
}
