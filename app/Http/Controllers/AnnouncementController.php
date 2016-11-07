<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/05/2016
 * Time: 13:23
 */
use App\Http\Requests\CreateAnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;
use DB;


/**
 * Class AnnouncementController
 * @package App\Http\Controllers
 */
class AnnouncementController extends Controller {

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request) {
        $announcements = Announcement::query()
            ->with('owner')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('announcements.index', [
            'announcements' => $announcements
        ])
            ->with('i', ($request->input('page', 1) - 1) * 5);


    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create () {

        return view ('announcements.create');
    }

    /**
     * @param CreateAnnouncementRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (CreateAnnouncementRequest $request) {
        $owner = null;
        if($request->has('owner_email'))
        {
            $owner = User::firstOrNew(['email' => $request->get('owner_email')]);
            $is_new = false;
            if(!$owner->exists)
            {
                $is_new = true;
                $owner->save();
            }

            // check if a new owner and if so save the user
            if($is_new)
                User::updateOrCreate(
                    ['user_id' => $owner->id],
                    ['fullname' => $request->get('owner_fullname')]);
        }
        else
            $owner = $request->user();

        $announcement = Announcement::create([
            'title'=>$request->get('title'),
            'message'=>$request->get('message'),
            'owner_id' =>$owner->id

        ]);

        $announcement->save();

        return redirect()->route('announcement.index')
            ->with('success','Announcement updated successfully');


    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)

    {

        $announcement = Announcement::find($id);

        return view('announcements.show',[

            'announcement'=>$announcement
        ]);

    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);

        return view('announcements.edit', [

            'announcement'=>$announcement
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

            'title' => 'required',

            'message' => 'required',

        ]);


        $announcement = Announcement::find($id);

        $announcement->title = $request->input('title');

        $announcement->message = $request->input('message');

        $announcement->save();

        return redirect()->route('announcements.index')

            ->with('success','Announcement updated successfully');

    }

    /**

     * Remove the specified resource from storage.

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)
    {
        Announcement::find($id)->delete();

        return redirect()->route('announcement.index')

            ->with('success','Announcement deleted successfully');

    }

}