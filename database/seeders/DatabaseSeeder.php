<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Project::factory()->count(50)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // // $faker = Faker::create();

        // // foreach (range(1, 100) as $index) {
        // //     DB::table('project')->insert([
        // //         'name' => $faker->name,
        // //         'test_type' => $faker->test_type,
        // //         'test_level' => $faker->test_level,
        // //         'start_date' => $faker->date($format = 'Y-m-d', $max = '2024', $min = '2022'),
        // //         'end_date' => $faker->date($format = 'Y-m-d', $max = '2024', $min = '2022'),
        // //         'desc' => $faker->desc,
        // //         'scope' => $faker->scope,
        // //         'issue' => $faker->issue,
        // //         'credentials' => $faker->credentials,
        // //         'sat_process' => $faker->sat_process,
        // //         'retesting' => $faker->retesting,
        // //         'uat_result' => $faker->uat_result,
        // //         'tmp' => $faker->tmp,
        // //         'env' => $faker->env,
        // //         'type' => $faker->type,
        // //         'tmp_remark' => $faker->tmp_remark,
        // //         'updated_remark' => $faker->updated_remark,
        // //         'other_remark' => $faker->other_remark,
        // //         'user_id' => 1
        // //     ]);
        // }
    }
}
