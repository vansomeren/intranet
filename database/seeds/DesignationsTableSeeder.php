<?php

use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designation = [
            [
                'name' => 'Accounts Clerk',
                'display_name' => 'Accounts Clerk ',
                'description' => 'Accounts Clerk '
            ]
        ];

        foreach ($designation as $key => $value) {

            Designation::create($value);


        }
    }
}
