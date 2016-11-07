<?php namespace App\Models;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20/09/2016
 * Time: 15:45
 */
 use Illuminate\Database\Eloquent\Model;
 use Carbon\Carbon;

 /**
  * Class Employee
  * @package App\Models
  */
 class Employee Extends Model {

    public $fillable = ['employee_number,fullname,email,branch_id,department_id,designation_id','employmentdate'];

    protected $dates = ['employmentdate'];

     /**
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function branch()
    {
        return $this->belongsTo('App\Models\Branches', 'branch_id');
    }

     /**
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

     /**
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function designation()
    {
        return $this->belongsTo('App\Models\Designation', 'designation_id');
    }
   /* public function getDates() {

        return ['employmentdate'];
    }
    public function setEmploymentdateAttribute($value) {

        $this->attributes['employmentdate'] = Carbon::createFromFormat('yyyy-m-d',$value);
    }*/
     /**
      * @param $value
      * @return string
      */
     public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('yyyy-mm-dd');
    }

     /**
      * @param $value
      */
     public function setDobAttribute($value)
    {
        $this->attributes['employmentdate'] = Carbon::createFromFormat('yyyy-mm-dd', $value)->toDateString();
    }

}
