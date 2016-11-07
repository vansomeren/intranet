<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/11/2016
 * Time: 12:01
 */
use App\Models\Upload;
use Datatables;
/**
 * Class CirculaController
 * @package App\Http\Controllers
 */
  class CircularController extends Controller {
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
     {
         return view('partials.circulars');
     }

    /**
     * @return mixed
     */
    public function getCircular()
     {
         $entries = Upload::select('id','original_filename','filetype_id','subject')->get();
         $file = Storage::get($entries->filename);

         return Datatables::of($entries)
             ->make(true)
             ->  Response()->download($file, 200)
             ->header('Content-Type', $entries->mime);
     }
 }