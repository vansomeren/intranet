<?php namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/09/2016
 * Time: 12:37
 */
Use Illuminate\Http\Request;
use App\Models\Employee;
/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        $search = \Request::get('search');

        $employees = Employee::where('fullname','like','%'.$search.'%')
            ->orderBy('id', 'DESC')
            ->paginate(5);

        return view('staff.index', [
            'employees' => $employees
        ])
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $branches = \DB::table('branches')->pluck('name', 'id');
        $departments = \DB::table('departments')->pluck('name', 'id');
        $designations = \DB::table('designations')->pluck('name', 'id');

        return view('staff.create', [
            'branches' => $branches,
            'departments' => $departments,
            'designations' => $designations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)

    {
        $this->validate($request, [

            'employee_id' => 'required|unique:employees,employee_id',

            'fullname' => 'required',

            'email' => 'required|email|unique:employees,email',

            'branch_id' => 'required',

            'department_id' => 'required',

            'designation_id' => 'required',

            'employmentdate' => 'required',

        ]);
        $employee = new Employee();

        $employee->employee_id = $request->input('employee_id');

        $employee->fullname = $request->input('fullname');

        $employee->email = $request->input('email');

        $employee->branch_id = $request->input('branch_id');

        $employee->department_id = $request->input('department_id');

        $employee->designation_id = $request->input('designation_id');

        $employee->employmentdate = $request->input('employmentdate');

        $employee->save();

        return redirect()->route('employee.index')

            ->with('success', 'Employee created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)

    {

        $employee = Employee::find($id);

        return view('staff.show', [
            'employee' => $employee
        ]);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $employee = Employee::find($id);

        $branches = \DB::table('branches')->pluck('name', 'id');
        $departments = \DB::table('departments')->pluck('name', 'id');
        $designations = \DB::table('designations')->pluck('name', 'id');

        return view('staff.edit', [
            'branches' => $branches,
            'employee' => $employee,
            'departments' => $departments,
            'designations' => $designations
        ]);

    }
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'employee_id' => 'required',

            'fullname' => 'required',

            'email' => 'required|email',

            'branch_id' => 'required',

            'department_id' => 'required',

            'designation_id' => 'required',

            'employmentdate' => 'required',

        ]);

        $employee = Employee::find($id);

        $employee->employee_id = $request->input('employee_id');

        $employee->fullname = $request->input('fullname');

        $employee->email = $request->input('email');

        $employee->branch_id = $request->input('branch_id');

        $employee->department_id = $request->input('department_id');

        $employee->designation_id = $request->input('designation_id');

        $employee->employmentdate = $request->input('employmentdate');

        $employee->save();

        return redirect()->route('employee.index')

            ->with('success', 'Employee Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)

    {

        Employee::find($id)->delete();

        return redirect()->route('employee.index')

            ->with('success', 'Employee deleted successfully');

    }


}