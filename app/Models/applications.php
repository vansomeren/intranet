<?php namespace App\Models;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/09/2016
 * Time: 09:57
 */
use Illuminate\Database\Eloquent\Model;

/**
 * Class applications
 * @package App\Models
 */
class Applications extends Model {

     protected $table = 'training_applications';

     protected  $fillable = ['training_id','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function training() {

         return $this->belongsTo('App\Models\Training','training_id');
     }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {

         return $this->belongsTo('App\Models\User','user_id');
     }
 }