<?php

use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = [
            [
                'name' => 'Operations',
                'display_name' => 'Operations Department',
                'description' => 'Operations Department'
            ]
        ];

        foreach ($department as $key => $value) {

            Department::create($value);


        }
    }
}
