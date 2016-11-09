<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30/05/2016
 * Time: 09:30
 */
use App\Models\Announcement;
use App\Models\Training;
use App\Models\Employee;
use DB;
use Datatables;
/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $search = \Request::get('search');

        $announced = Announcement::query()
            ->with('owner')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $employed = Employee::query()
        ->orderBy('created_at','desc')
            ->paginate(4);

        $training = Training::query()
            ->orderBy('created_at','desc')
            ->paginate(4);




        return view('dashboard',[
            'employed'=>$employed,
            'training' => $training,
            'announced' => $announced,

        ]);
    }


}