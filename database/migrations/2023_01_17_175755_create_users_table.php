<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->char('id_user', 8)->primary();
            $table->integer('id_role');
            $table->string('username', 50);
            $table->string('email', 50);
            $table->string('password', 225);
            // foreign key
            $table
                ->foreign('id_role')
                ->references('id_role')
                ->on('role')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
