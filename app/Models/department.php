<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/09/2016
 * Time: 13:07
 */

class Department extends Model{
    protected $table ='departments';
    public $fillable = ['name,display_name,description'];
}