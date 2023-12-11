<?php

namespace Database\Seeders;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'Project Test 1',
            'jira_code' => 'AABBCC',
            'start_date' => Carbon::parse('2023-12-11'),
            'end_date' => Carbon::parse('2023-12-13'),
            'user_id' => 1
        ]);
    }
}
