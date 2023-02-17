<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("DROP FUNCTION IF EXISTS new_id_ruangan");
        DB::unprepared(
            "CREATE FUNCTION new_id_ruangan()
            RETURNS CHAR(5)
            BEGIN
            DECLARE kode_lama CHAR(5);
            DECLARE kode_baru CHAR(5);
            DECLARE ambil_angka INT;
            DECLARE angka_baru CHAR(5);
            DECLARE jumlah INT;
            SELECT COUNT(id_ruangan) INTO jumlah FROM ruangan;
            IF(jumlah = 0) THEN
                SET kode_baru = CONCAT('R',0,0,0,1);
            ELSE
                SELECT MAX(id_ruangan) INTO kode_lama FROM ruangan;
                SET ambil_angka = SUBSTR(kode_lama, 5, 1) + 1;
                SET angka_baru = LPAD(ambil_angka,4, 0);
                SET kode_lama = SUBSTR(kode_lama, 1, 1);
                SET kode_baru = CONCAT(kode_lama, angka_baru);
            END IF;
            RETURN kode_baru;
            END;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('function_new_id_ruangan');
    }
};
