<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fileentry
 * @package App
 */
class Upload extends Model
{
    public $fillable = ['filename,mime,original_filename,filetype_id,subject'];


    public function department()
    {
        return $this->belongsTo('App\Models\department', 'filetype_id');
    }
}
