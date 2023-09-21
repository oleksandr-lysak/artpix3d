<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            'Андрій',
            'Сергій',
            'Михайло',
            'Стас',
            'Артем',
            'Тетяна',
            'Євген',
            'Катя',
            'Борис',
        ];

        foreach ($employees as $employeeName) {
            Employee::create([
                'name' => $employeeName,
            ]);
        }
    }
}
