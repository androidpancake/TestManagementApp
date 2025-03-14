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
                'name' => 'Raissa',
                'unit' => 'ASP',
                'department' => 'IT WHA',
                'username' => 'ven.benitaraissa',
                'password' => Hash::make('test123')
            ],
            // [
            //     'name' => 'Ilham',
            //     'unit' => 'ASP',
            //     'department' => 'IT WHA',
            //     'username' => 'ven.ilhammaulana',
            //     'password' => Hash::make('Bandungceria11@')
            // ]
        );
    }
}
