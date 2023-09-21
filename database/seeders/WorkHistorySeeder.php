<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\WorkHistoryFactory;
use App\Models\WorkHistory;

class WorkHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkHistory::factory()->count(1000)->create();
    }
}
