<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@tes',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'telephone' => '08123456789',
                'address' => 'Jl. Raya Wangun, RT.01/RW.06, Sindangsari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16146',
                'created_at' => now(),
            ],
            [
                'name' => 'Patrick Cashier',
                'email' => 'cashier@tes',
                'password' => Hash::make('cashier'),
                'role' => 'cashier',
                'telephone' => '08123456789',
                'address' => 'Jl. Raya Wangun, RT.01/RW.06, Sindangsari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16146',
                'created_at' => now(),
            ],
            [
                'name' => 'Cashier 2',
                'email' => 'cashier2@tes',
                'password' => Hash::make('cashier2'),
                'role' => 'cashier',
                'telephone' => '08123456789',
                'address' => 'Jl. Raya Wangun, RT.01/RW.06, Sindangsari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16146',
                'created_at' => now(),
            ],
            [
                'name' => 'user',
                'email' => 'user@tes',
                'password' => Hash::make('user'),
                'role' => 'user',
                'telephone' => '08123456789',
                'address' => 'Otto Iskandardinata kampung tanjung, RT.003/RW.013, Pasawahan, Kec. Tarogong Kaler, Kabupaten Garut, Jawa Barat 44151',
                'created_at' => now(),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@tes',
                'password' => Hash::make('user1'),
                'role' => 'user',
                'telephone' => '08123456780',
                'address' => 'Address 1',
                'created_at' => now(),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@tes',
                'password' => Hash::make('user2'),
                'role' => 'user',
                'telephone' => '08123456781',
                'address' => 'Address 2',
                'created_at' => now(),
            ],
            [
                'name' => 'user3',
                'email' => 'user3@tes',
                'password' => Hash::make('user3'),
                'role' => 'user',
                'telephone' => '08123456782',
                'address' => 'Address 3',
                'created_at' => now(),
            ],
            [
                'name' => 'user4',
                'email' => 'user4@tes',
                'password' => Hash::make('user4'),
                'role' => 'user',
                'telephone' => '08123456783',
                'address' => 'Address 4',
                'created_at' => now(),
            ],
            [
                'name' => 'user5',
                'email' => 'user5@tes',
                'password' => Hash::make('user5'),
                'role' => 'user',
                'telephone' => '08123456784',
                'address' => 'Address 5',
                'created_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
