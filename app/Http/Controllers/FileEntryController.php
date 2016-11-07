<?php namespace App\Http\Controllers;

use App\Models\Upload;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;
use Validator;
use App\Http\Requests\UploadFileRequest;


/**
 * Class FileEntryController
 * @package App\Http\Controllers
 */
class FileEntryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(\Illuminate\Http\Request $request)
    {
            $search = \Request::get('search');

        $entries = Upload::where('original_filename','like','%'.$search.'%')
            ->orderBy('original_filename')
            ->paginate(20);

        return view('upload.index', [
            'entries'=>$entries,
        ])
            ->with('i', ($request->input('page', 1) - 1) * 5);



    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $filetype     = \DB::table('departments')->pluck('name','id');

        return view('upload.upload', [
            'filetype'=>$filetype
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UploadFileRequest $request) {

        $file = Request::file('filefield');
        $extension = $file->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());

        $entry = new Upload();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename() . '.' . $extension;
        $entry->filetype_id = $request->input('filetype_id');
        $entry->subject = $request->input('subject');

        $entry->save();

        return redirect()->route('upload.index')
            ->with('success','File uploaded successfully');

    }
    /**
     * @param $filename
     * @return mixed
     */
    public function get($filename){

        $entry = Upload::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::get($entry->filename);

        return  Response()->download($file, 200)
            ->header('Content-Type', $entry->mime);
    }

}
