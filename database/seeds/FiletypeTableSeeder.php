<?php

use Illuminate\Database\Seeder;
use App\Models\filetype;

class FiletypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            [
                'name' => 'Leave Allowance',
                'description' => 'Leave Allowance Form '
            ],
            [
                'name' => 'Medical Claim',
                'description' => 'Medical Claim Form '
            ],
            [
                'name' => 'Salary Advance',
                'description' => 'Salary Advance Form '
            ],
            [
                'name' => 'Expense Reimbursements',
                'description' => 'Expense Reimbursements Form '
            ],
            [
                'name' => 'Loan Application',
                'description' => 'Loan Application Form '
            ],


        ];

        foreach ($type as $key => $value) {

            Filetype::create($value);


        }
    }
}
