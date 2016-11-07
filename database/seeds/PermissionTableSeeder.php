<?php
use Illuminate\Database\Seeder;

use App\Models\permission;


class PermissionTableSeeder extends Seeder

{

/**

* Run the database seeds.

*

* @return void

*/

public function run()

{

$permission = [

[

'name' => 'employee-list',

'display_name' => 'Display Employee Listing',

'description' => 'See only Listing Of Employee'

],

[

'name' => 'employee-create',

'display_name' => 'Create Employee',

'description' => 'Create New Employee'

],

[

'name' => 'employee-edit',

'display_name' => 'Edit Employee',

'description' => 'Edit Employee'

],

[

'name' => 'employee-delete',

'display_name' => 'Delete Employee',

'description' => 'Delete Employee'

],

[

'name' => 'training-list',

'display_name' => 'Display Training Listing',

'description' => 'See only Listing Of Trainings'

],

[

'name' => 'training-create',

'display_name' => 'Create Training',

'description' => 'Create New Training'

],

[

'name' => 'training-edit',

'display_name' => 'Edit Training',

'description' => 'Edit Training'

],

[

'name' => 'training-delete',

'display_name' => 'Delete Training',

'description' => 'Delete Training'

]

];


foreach ($permission as $key => $value) {

permission::create($value);

}

}

}