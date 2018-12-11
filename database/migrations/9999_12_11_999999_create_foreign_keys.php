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
        Schema::table('examinations', function (Blueprint $table) {
            $table->foreign('manager_id')
                ->references('id')->on('user')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });

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

        Schema::table('marks', function (Blueprint $table) {
            $table->foreign('examination_id')
                ->references('id')->on('examinations')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');
        });
        Schema::table('marks', function (Blueprint $table) {
            $table->foreign('examiner_id')
                ->references('id')->on('users')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');
        });
        Schema::table('marks', function (Blueprint $table) {
            $table->foreign('student_id')
                ->references('id')->on('users')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');
        });
        Schema::table('marks', function (Blueprint $table) {
            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('RESTRICT')
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
