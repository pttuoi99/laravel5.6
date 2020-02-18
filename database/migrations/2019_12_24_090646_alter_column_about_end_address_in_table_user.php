<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnAboutEndAddressInTableUser extends Migration
{
    public function up()
    {
        Schema::table('users',function (Blueprint $table){
            $table->string('address')->nullable();
            $table->string('about')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users',function (Blueprint $table){
            $table->dropColumn('address');
            $table->dropColumn('about');
        });
    }
}
