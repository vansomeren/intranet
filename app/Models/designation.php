<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/09/2016
 * Time: 15:46
 */

class Designation extends Model{

    public $fillable = ['name,display_name,description'];
}