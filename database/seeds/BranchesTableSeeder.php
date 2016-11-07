<?php

use Illuminate\Database\Seeder;
use App\Models\branches;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branch = [
            [
                'name' => 'Westlands',
                'town' => 'Nairobi',
                'location' => 'Sound Plaza',
                'telephone' => '+254712123456',
                'branchmanager' => 'Example Branch Manager'
            ]
        ];

        foreach ($branch as $key => $value) {

            Branches::create($value);


        }
    }
}
