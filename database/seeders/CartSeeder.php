<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carts')->insert([
            [
                'user_id' => 1,
                'medicine_id' => 1,
                'quantity' => 2,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'medicine_id' => 2,
                'quantity' => 1,
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'medicine_id' => 3,
                'quantity' => 3,
                'created_at' => now(),
            ],
        ]);
    }
}
