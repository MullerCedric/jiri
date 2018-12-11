<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examination_user', function (Blueprint $table) {
            $table->foreign('examination_id')
                ->references('id')->on('examinations')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');
        });
        Schema::table('examination_user', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('examination_id')
                ->references('id')->on('examinations')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('apply_for_user')
                ->references('id')->on('users')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
}
