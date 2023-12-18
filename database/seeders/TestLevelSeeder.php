<?php

namespace Database\Seeders;

use App\Models\TestLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TestLevel::create([
            'type' => 'Business Functionality'
        ]);
    }
}
