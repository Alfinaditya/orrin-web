<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use App\Models\User;
use App\Models\MensParfume;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Salahudin Al Ayyubi',
            'username' => 'Didin',
            'email' => 'Didin199971@gmail.com',
            'password' => bcrypt('terimakasih'),
        ]);


        // MensParfume::create([
        //     'nama' => 'Scandalus',
        //     'category_id' => mt_rand(1, 2),
        //     'deskripsi' => 'Scandalus Parfume',
        //     'harga' => '55.000'
        // ]);

        // MensParfume::create([
        //     'nama' => 'XXI',
        //     'category_id' => mt_rand(1, 2),
        //     'deskripsi' => 'XXI Parfume',
        //     'harga' => '60.000'
        // ]);

        // Categories::create([
        //     'user_id' => '2',
        //     'kategori' => 'Batch I',
        // ]);

        // Categories::create([
        //     'user_id' => '2',
        //     'kategori' => 'Batch II',
        // ]);

        // MensParfume::factory(20)->create([
        //     'harga' => '50.000',
        //     'image' => 'post-images/e1Fhi1rrvnK7gVXCnMxEXBmQC4SMYR6mGDg2DcVC.png'
        // ]);
    }
}
