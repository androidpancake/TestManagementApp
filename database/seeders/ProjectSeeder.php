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
            'test_type' => 'SIT',
            'test_level' => 'Business',
            'start_date' => Carbon::parse('2023-12-11'),
            'end_date' => Carbon::parse('2023-12-13'),
            'desc' => 'Test',
            'scope' => 'Test',
            'issue' => 'An issue',
            'credentials' => 'ABC001',
            'sat_process' => 'yes',
            'retesting' => 'yes',
            'uat_result' => 'yes',
            'tmp' => 'yes',
            'env' => 'test1',
            'other' => 'testt',
            'type' => 'AADD',
            'user_id' => 1
        ]);
    }
}
