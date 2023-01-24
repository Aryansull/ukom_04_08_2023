<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = collect([
            [

                'id_role' => '00',
                'nama_role' => 'admin',
            ],
            [

                'id_role' => '00',
                'nama_role' => 'kaprog',
            ],
            [

                'id_role' => '00',
                'nama_role' => 'walikelas',
            ],
            [

                'id_role' => '00',
                'nama_role' => 'penanggungjawab',
            ]
        ]);
        $role->each(fn ($rl) => DB::table('role')->insert($rl));
    }
}