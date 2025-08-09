<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Task_detail;
use App\Models\TaskDetail;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() : void
    {
        // User::factory(10)->create();

        User::factory()->count( 20 )->create();
        Task::factory()->count( 20 )->create();
        TaskDetail::factory()->count( 20 )->create();
    }
}
