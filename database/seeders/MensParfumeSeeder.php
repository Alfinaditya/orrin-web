<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MensParfumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mens_parfumes')->insert([
            'nama' => 'Black Opium',
            'deskripsi' => 'Lorem Ipsum dolores sit',
            'kategori' => 'batch1',
            'harga' => '60.000'
        ]);
    }
}
