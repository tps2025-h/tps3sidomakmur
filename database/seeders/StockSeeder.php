<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    public function run()
        {

        Stock::insert([
            ['id_category' => 1, 'nama_barang' => 'Plastik', 'jumlah_stock' => 100, 'harga_satuan' => 2000],
            ['id_category' => 2, 'nama_barang' => 'Kertas', 'jumlah_stock' => 150, 'harga_satuan' => 2500],
            ['id_category' => 3, 'nama_barang' => 'Logam', 'jumlah_stock' => 200, 'harga_satuan' => 5000],
        ]);
    }
}
