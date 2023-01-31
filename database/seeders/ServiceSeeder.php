<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Service::create([
            'name' => 'Un-yellowing Rubber',
            'slug' => 'unyelowing-rubber',
            'image' => 'https://images.unsplash.com/photo-1589989369979-8e1b2e1b2f1a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c2VwYXQlMjBzZXBhdHVyZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80',
            'price' => '100000',
            'description' => 'Menghilangkan kuning pada sol sepatu',
        ]);

        \App\Models\Service::create([
            'name' => 'Signature',
            'slug' => 'signature',
            'image' => 'https://images.unsplash.com/photo-1589989369979-8e1b2e1b2f1a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c2VwYXQlMjBzZXBhdHVyZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80',
            'price' => '200000',
            'description' => 'Mmbersihkan sepatu dengan teknik signature kita',
        ]);

        \App\Models\Service::create([
            'name' => 'Essential',
            'slug' => 'essential',
            'image' => 'https://images.unsplash.com/photo-1589989369979-8e1b2e1b2f1a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c2VwYXQlMjBzZXBhdHVyZXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80',
            'price' => '300000',
            'description' => 'Membersihkan sepatu dengan teknik essential kita',
        ]);
    }
}
