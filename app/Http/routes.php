<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('auth.login');
});*/
Route::get('/', [ 'uses' => 'DashboardController@index', 'as' => 'dashboard']);

Route::get('circular','CircularController@index');
Route::get('circular/getCircular','CircularController@getCircular');
Route::auth();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');
    Route::get('menu','MenuController@index');

    //users
    Route::resource('users','UserController');
    Route::get('users',['as'=>'users.index','uses' => 'UserController@index']);
    Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
    Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
    Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
    Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
    Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);

    //roles
    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

    //permissions
    Route::get('permissions',['as'=>'permissions.index','uses'=>'PermissionController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('permissions/create',['as'=>'permissions.create','uses'=>'PermissionController@create','middleware' => ['permission:role-create']]);
    Route::post('permissions/create',['as'=>'permissions.store','uses'=>'PermissionController@store','middleware' => ['permission:role-create']]);
    Route::get('permissions/{id}',['as'=>'permissions.show','uses'=>'PermissionController@show']);
    Route::get('permissions/{id}/edit',['as'=>'permissions.edit','uses'=>'PermissionController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('permissions/{id}',['as'=>'permissions.update','uses'=>'PermissionController@update','middleware' => ['permission:role-edit']]);
    Route::delete('permissions/{id}',['as'=>'permissions.destroy','uses'=>'PermissionController@destroy','middleware' => ['permission:role-delete']]);

    //items
    Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
    Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
    Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
    Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
    Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
    Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
    Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);

    //announcements
    Route::get('announcements', ['uses' => 'AnnouncementController@index','as' => 'announcement.index']);
    Route::get('announcements/create',['uses' => 'AnnouncementController@create', 'as' => 'announcement.create']);
    Route::post('announcements/create',['uses' => 'AnnouncementController@store', 'as' => 'announcement.create']);
    Route::get('announcements/{id}',['as'=>'announcement.show','uses'=>'AnnouncementController@show']);
    Route::get('announcements/{id}/edit',['as'=>'announcement.edit','uses'=>'AnnouncementController@edit','middleware' => ['permission:announcement-edit']]);
    Route::patch('announcements/{id}',['as'=>'announcement.update','uses'=>'AnnouncementController@update','middleware' => ['permission:announcement-edit']]);
    Route::delete('announcements/{id}',['as'=>'announcement.destroy','uses'=>'AnnouncementController@destroy','middleware' => ['permission:announcement-delete']]);

    //employees
    Route::get('employees', ['uses' => 'EmployeeController@index','as' => 'employee.index']);
    Route::get('employees/create',['uses' => 'EmployeeController@create', 'as' => 'employee.create']);
    Route::post('employees/create',['as'=>'employee.store','uses'=>'EmployeeController@store']);
    Route::get('employees/{id}',['as'=>'employee.show','uses'=>'EmployeeController@show']);
    Route::get('employees/{id}/edit',['as'=>'employee.edit','uses'=>'EmployeeController@edit','middleware' => ['permission:announcement-edit']]);
    Route::patch('employees/{id}',['as'=>'employee.update','uses'=>'EmployeeController@update','middleware' => ['permission:announcement-edit']]);
    Route::delete('employees/{id}',['as'=>'employee.destroy','uses'=>'EmployeeController@destroy','middleware' => ['permission:announcement-delete']]);

    //trainings
    Route::get('trainings', ['uses' => 'TrainingController@index','as' => 'training.index']);
    Route::get('trainings/create',['uses' => 'TrainingController@create', 'as' => 'training.create']);
    Route::post('trainings/create',['as'=>'training.store','uses'=>'TrainingController@store']);
    Route::get('trainings/{id}',['as'=>'training.show','uses'=>'TrainingController@show']);
    Route::get('trainings/{id}/edit',['as'=>'training.edit','uses'=>'TrainingController@edit','middleware' => ['permission:announcement-edit']]);
    Route::patch('trainings/{id}',['as'=>'training.update','uses'=>'TrainingController@update','middleware' => ['permission:announcement-edit']]);
    Route::delete('trainings/{id}',['as'=>'training.destroy','uses'=>'TrainingController@destroy','middleware' => ['permission:announcement-delete']]);
    Route::post('trainings/{id}',['as'=>'training.apply','uses'=>'TrainingController@apply']);
    Route::delete('applications/{id}',['as'=>'application.destroy','uses'=>'TrainingController@unapply','middleware' => ['permission:announcement-delete']]);

    //upload
    Route::get('uploaded',['uses'=>'FileEntryController@index','as'=>'upload.index']);
    Route::get('uploads/get/{filename}', ['uses' => 'FileEntryController@get','as' => 'upload.download']);
    Route::get('uploads/create',['uses'  => 'FileEntryController@create','as' => 'upload.create']);
    Route::post('uploads/create',['uses' => 'FileEntryController@store','as' => 'upload.store']);
});

Route::get('/home', 'HomeController@index');
