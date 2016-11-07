<?php namespace App\Models;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/09/2016
 * Time: 15:50
 */

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


/**
 * Class training
 * @package App\Models
 */
class Training extends Model {

    public $fillable = ['title,department,startdate,enddate,venue,description'];

    protected $date = ['startdate,enddate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    /**
     * @param $value
     * @return string
     */
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('yyyy-mm-dd');
    }

    /**
     * @param $value
     */
    public function setDateAttribute($value)
    {
        $this->attributes['startdate'] = Carbon::createFromFormat('yyyy-mm-dd', $value)->toDateString();
        $this->attributes['enddate'] = Carbon::createFromFormat('yyyy-mm-dd', $value)->toDateString();

    }
}
