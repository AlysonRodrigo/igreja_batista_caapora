<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAdminData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Cookiesoft\Models\User::create([
            'name' => env('ADMIN_DEFAULT_NAME','Alyson Rodrigo'),
            'email' => env('ADMIN_DEFAULT_EMAIL','aci.alyson@gmail.com'),
            'sexo' => 'Masculino',
            'password' => bcrypt(env('ADMIN_DEFAULT_PASSWORD','secret')),
            'data_nascimento' => '1990-12-21',
            'role' => \Cookiesoft\Models\User::ROLE_ADMIN,
            'remember_token' => str_random(10)
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = \Cookiesoft\Models\User::find(1);
        $user->delete();
    }
}
