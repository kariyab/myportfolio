<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        "name" => "required",
        "bbs_id" => "required",
        "answer" => "required",
    );
    
    public function histories()
    {
        return $this->hasMany('App\Answer_history');
    }
}
