<?php

namespace Database\Seeders;

use App\Models\Machine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MachinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $machines = [44, 56, 23, 78, 102];

        foreach ($machines as $machineNumber) {
            Machine::create([
                'name' => $machineNumber,
            ]);
        }
    }
}
