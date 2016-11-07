<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/10/2016
 * Time: 13:04
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class announcement
 * @package App\Models
 */
class Announcement extends Model {

    /** The Database table
     * used by the table
     */
    protected $table = 'announcements';

    /** Attributes that are mass assigned
     *
     */
    protected $fillable = ['title','message','owner_id'];

    /**
     * Relation to owner
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }


}