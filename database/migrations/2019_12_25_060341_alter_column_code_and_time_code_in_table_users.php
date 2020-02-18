<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnCodeAndTimeCodeInTableUsers extends Migration
{
    public function up()
    {
        Schema::table('users',function (Blueprint $table){
            $table->string('code')->nullable()->index();
            $table->timestamp('time_code')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users',function (Blueprint $table){
            $table->dropColumn('code');
            $table->dropColumn('time_code');
        });
    }
}
