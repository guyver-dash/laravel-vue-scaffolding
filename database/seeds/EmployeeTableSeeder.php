<?php

use Illuminate\Database\Seeder;
use App\Model\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            Employee::create([
                'firstname' => $faker->firstName($gender = null),
                'lastname' => $faker->lastName,
                'company_id' => rand(1, 99),
                'email' => $faker->safeEmail,
                'phone' => $faker->phoneNumber
            ]);
          }
    }
}
