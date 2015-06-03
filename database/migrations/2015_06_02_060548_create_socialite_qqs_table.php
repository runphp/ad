<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialiteQqsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('socialite_qqs',
            function (Blueprint $table) {
                $table->char('id', 32)->unique();
                $table->integer('user_id')
                    ->unsigned()
                    ->unique();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('socialite_qqs');
    }
}
