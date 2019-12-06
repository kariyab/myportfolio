<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        "name" => "required",
        "answer" => "required",
    );
    
    public function histories()
    {
        return $this->hasMany('App\Answer_history');
    }
    
    public function post()
    {
        return $this->belongsTo('App\Bbs');
    }
}
