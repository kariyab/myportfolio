<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer_history extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'answer_id' => 'required',
        'edited_at' => 'required',
    );
}
