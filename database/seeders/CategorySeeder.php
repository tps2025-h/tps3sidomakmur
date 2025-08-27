<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            ['nama_category' => 'Plastik', 'harga' => 5000, 'deskripsi' => 'Tidak ada deskripsi'],
            ['nama_category' => 'Kertas', 'harga' => 3000, 'deskripsi' => 'Tidak ada deskripsi'],
            ['nama_category' => 'Logam', 'harga' => 7000, 'deskripsi' => 'Tidak ada deskripsi'],
        ]);        
    }
}

