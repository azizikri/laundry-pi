<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Package::factory(10)->create();
        \App\Models\Package::create([
            'name' => 'Basic',
            'slug' => 'basic',
            'kg' => 2,
            'price' => '100000',
            'description' => 'Basic
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
        ]);

        \App\Models\Package::create([
            'name' => 'Premium',
            'slug' => 'premium',
            'kg' => 5,
            'price' => '200000',
            'description' => 'Premium
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
        ]);

        \App\Models\Package::create([
            'name' => 'Gold',
            'slug' => 'gold',
            'kg' => 10,
            'price' => '300000',
            'description' => 'Gold
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.',
        ]);
    }
}
