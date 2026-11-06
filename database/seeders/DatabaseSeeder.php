<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminyainiwak'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'custo',
            'email' => 'custo@gmail.com',
            'password' => bcrypt('custoyainiwak'),
            'role' => 'customer',
        ]);

        Kategori::create([
            'name' => 'plush',
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/B-Cat Plushie.jpg',
            'name' => 'B-Cat Plushie',
            'price' => 190000,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/BB Plushie.jpg',
            'name' => 'BB Plushie',
            'price' => 129000,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/Bear Plushie.jpg',
            'name' => 'Bear Plushie',
            'price' => 120000,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/Bunny Plushie.jpg',
            'name' => 'Bunny Plushie',
            'price' => 145000,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/Chick Plushie.jpg',
            'name' => 'Chick Plushie',
            'price' => 145000,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/Deer Plushie.jpg',
            'name' => 'Deer Plushie',
            'price' => 167800,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/Fox Plushie.jpg',
            'name' => 'Fox Plushie',
            'price' => 159000,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/Lamb Plushie.jpg',
            'name' => 'Lamb Plushie',
            'price' => 146000,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/Nemo Plushie.jpg',
            'name' => 'Nemo Plushie',
            'price' => 130000,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);

        Produk::create([
            'kategori_id' => 1,
            'foto' => 'img/Sleepy Bear Plushie.jpg',
            'name' => 'Sleepy Bear Plushie',
            'price' => 200000,
            'description' => 'Good Quality Plushie',
            'qty' => 200,
        ]);
    }
}
