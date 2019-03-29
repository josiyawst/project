<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Notification extends Model
{
    protected $table = 'cw_notification';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'message'];
    public static $rules = array(
        'title' => 'required',
        'message' => 'required'
    );

    public static function validate_update($data, $id)
    {
        $updateRule = static::$rules;
        $updateRule['title'] = 'required';
        $updateRule['message'] = 'required';
        return Validator::make($data, $updateRule);
    }

    /* Relations */
}
