<?php

use Illuminate\Database\Seeder;
use App\Models\role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [

                'name' => 'admin',

                'display_name' => 'Admin',

                'description' => 'Administrator'

            ],
            [

                'name' => 'staff',

                'display_name' => 'Staff',

                'description' => 'Staff'

            ],
            [

                'name' => 'sales',

                'display_name' => 'Sales',

                'description' => 'Sales'

            ],
            [

                'name' => 'superadmin',

                'display_name' => 'Super Admin',

                'description' => 'Super Administrator'

            ],
        ];
        foreach ($role as $key => $value) {

            role::create($value);

        }
    }
}
