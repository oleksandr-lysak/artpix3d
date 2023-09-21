<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Machine;
use App\Models\WorkHistory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

class WorkHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $availableEmployees = Employee::pluck('id')->toArray();
        $availableMachines = Machine::pluck('id')->toArray();

        $startPeriod = Carbon::now()->subMonth();
        $endPeriod = Carbon::now();

        $startDate = $this->faker->dateTimeBetween($startPeriod, $endPeriod);
        $endDate = clone $startDate;

        $endDate->modify('+2 hours');


        return [
            'employee_id' => $this->faker->randomElement($availableEmployees),
            'machine_id' => $this->faker->randomElement($availableMachines),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}



// use App\Models\WorkHistory;
// use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;
// use Illuminate\Support\Carbon;

// $factory->define(WorkHistory::class, function (Faker $faker) {
//     $availableEmployees = WorkHistory::pluck('employee_id')->toArray();
//     $availableMachines = WorkHistory::pluck('machine_id')->toArray();

//     $startPeriod = Carbon::now()->subMonth();
//     $endPeriod = Carbon::now();

//     $startDate = $faker->dateTimeBetween($startPeriod, $endPeriod);
//     $endDate = $startDate->copy()->addHours(2);

//     return [
//         'employee_id' => $this->faker->unique()->randomElement($availableEmployees),
//        'machine_id' => $this->faker->unique()->randomElement($availableMachines),
//         'start_date' => $startDate,
//         'end_date' => $endDate,
//     ];
// });
