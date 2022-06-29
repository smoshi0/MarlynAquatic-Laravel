<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Akuarium;
use App\Models\Kategori;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin Marlyn Aquatic',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level' => 'admin'
        ]);

        User::create([
            'name' => 'Bayu Dirga',
            'username' => 'bayudirga',
            'password' => bcrypt('12345'),
            'level' => 'f_manajer'
        ]);

        User::create([
            'name' => 'Juna Alfarizi',
            'username' => 'juna',
            'password' => bcrypt('12345'),
            'level' => 'courier'
        ]);
        
        // User::factory(3)->create();


        Kategori::create([
            'nama_kategori' => 'Small Fish',
            'slug' => 'small-fish'
        ]);

        Kategori::create([
            'nama_kategori' => 'Medium Fish',
            'slug' => 'medium-fish'
        ]);

        Kategori::create([
            'nama_kategori' => 'Big Fish',
            'slug' => 'big-fish'
        ]);

        Akuarium::factory(25)->create();
        // Akuarium::factory(10)->create();

        // Akuarium::create([
        //     'kategori_id' => '2',
        //     'kode_akuarium' => 'B3',
        //     'nama_ikan' => 'Fisherman Island',
        //     'slug' => 'fisherman-island',
        //     'jumlah_ikan' => '20',
        //     'harga_ikan' => '7000'
        // ]);

    }
}
