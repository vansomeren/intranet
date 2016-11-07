<?php namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/08/2016
 * Time: 10:26
 */


use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\Permission;
use DB;
use Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{




    public function index(Request $request)

    {

        $data = User::orderBy('id','DESC')->paginate(3);

        return view('users.index',[
            'data'=>$data
        ])
            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        $roles = Role::lists('display_name','id');

        return view('users.create',[
            'roles'=>$roles
        ]);

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|same:confirm-password',

            'roles' => 'required'

        ]);


        $input = $request->all();

        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);

        foreach ($request->input('roles') as $key => $value) {

            $user->attachRole($value);

        }


        return redirect()->route('users.index')
            ->with('success','User created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        $user = User::find($id);
        $role = Permission::find($id);

        $userPermissions = Role::join("role_user","role_user.role_id","=","roles.id")
            ->where("role_user.user_id",$id);

        $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")

            ->where("permission_role.role_id",$id)

            ->get();
        return view('users.show',[
            'role'=>$role,
            'user'=>$user,
            'rolePermissions'=>$rolePermissions,
            'userPermissions'=>$userPermissions
        ]);
    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        $user = User::find($id);

        $roles = Role::lists('display_name','id');

        $userRole = $user->roles->lists('id','id')->toArray();


        $permission = Permission::get();

        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)

            ->lists('permission_role.permission_id','permission_role.permission_id');

        return view('users.edit',[
            'user'=>$user,
            'roles'=>$roles,
            'userRole'=>$userRole,
            'permission'=>$permission,
            'rolePermissions'=>$rolePermissions
        ]);
    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,'.$id,

            'password' => 'same:confirm-password',

            'roles' => 'required'

        ]);


        $input = $request->all();

        if(!empty($input['password'])){

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = array_except($input,array('password'));

        }


        $user = User::find($id);

        $user->update($input);

        DB::table('role_user')->where('user_id',$id)->delete();




        foreach ($request->input('roles') as $key => $value) {

            $user->attachRole($value);

        }


        return redirect()->route('users.index')
            ->with('success','User updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success','User deleted successfully');

    }



}