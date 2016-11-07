<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/09/2016
 * Time: 12:37
 */
Use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Applications;
use DB;

/**
 * Class TrainingController
 * @package App\Http\Controllers
 */
class TrainingController extends Controller {

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){

        $trainings = Training::query()
            ->orderBy('id','DESC')
            ->paginate(5);

        return view('trainings.index',[
            'trainings'=>$trainings
        ])
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $departments  = \DB::table('departments')->pluck('name', 'id');

        return view('trainings.create', [
            'departments'=> $departments
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

            'title' => 'required',

            'department_id' => 'required',

            'startdate'=>'required',

            'enddate' => 'required',

            'venue' => 'required',

            'description'=> 'required'

        ]);
        $training = new Training();

        $training->title = $request->input('title');

        $training->department_id = $request->input('department_id');

        $training->startdate =$request->input('startdate');

        $training->enddate = $request->input('enddate');

        $training->venue = $request->input('venue');

        $training->description = $request->input('description');

        $training->save();

        return redirect()->route('training.index')
            ->with('success','Training created successfully');
    }
    /**

     * Display the specified resource.

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)
    {
        $training = Training::find($id);
        return view('trainings.show',[
            'training'=>$training
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {

        $training = Training::find($id);

        $departments  = \DB::table('departments')->pluck('name', 'id');

        return view('trainings.edit', [
            'training'=>$training,
            'departments'=> $departments
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

            'title' => 'required',

            'department_id' => 'required',

            'startdate'=>'required',

            'enddate' => 'required',

            'venue' => 'required',

            'description'=> 'required'

        ]);
        $training = Training::find($id);

        $training->title = $request->input('title');

        $training->department_id = $request->input('department_id');

        $training->startdate =$request->input('startdate');

        $training->enddate = $request->input('enddate');

        $training->venue = $request->input('venue');

        $training->description = $request->input('description');

        $training->save();

        return redirect()->route('training.index')
            ->with('success','Training updated successfully');
    }
    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {
        Training::find($id)->delete();

        return redirect()->route('training.index')
            ->with('success','Training deleted successfully');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(Request $request,$id) {

        $trained = Training::find($id);

        $trained->training_id = $request->input('training_id');

        $trained->save();

        return redirect()->route('training.index')
            ->with('success','You have successfully applied for training');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unapply($id)
    {
        Applications::find($id)->delete();
        return redirect()->route('training.index')
            ->with('success','Unapplied successfully');
    }

}