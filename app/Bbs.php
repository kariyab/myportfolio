<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bbs extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        "name" => "required",
        "lang" => "required",
        "body" => "required",
    );
    
    public function histories()
    {
        return $this->hasMany('App\History');
    }
}
