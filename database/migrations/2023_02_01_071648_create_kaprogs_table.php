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
        Schema::create('kaprog', function (Blueprint $table) {
            $table->char('id_kaprog', 8)->primary();
            $table->char('id_user');
            $table->string('nama_kaprog', 50);
            $table->string('foto', 225);
            // foreign key
            $table
                ->foreign('id_user')
                ->references('id_user')
                ->on('user')
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
        Schema::dropIfExists('kaprog');
    }
};
