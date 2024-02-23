<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Ilham Maulana Abdurrahman',
                'unit' => 'ASP',
                'department' => 'IT WHA',
                'username' => 'ven.ilhammaulana',
                'password' => Hash::make('Bandungceria11#')
            ],
            // [
            //     'name' => 'Arif Hartato',
            //     'unit' => 'ASP',
            //     'department' => 'IT WHA',
            //     'role' => 'Admin',
            //     'username' => 'arif.hartato',
            //     'password' => Hash::make('test1234')
            // ]
        );
    }
}
