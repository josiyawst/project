<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class UserGroup extends Model
{
    protected $table = 'cw_user_group';
    protected $primaryKey = 'id';
    protected $fillable = ['title'];
    public static $rules = array('title' => 'required|unique:cw_user_group'
    );

    public static function validateUpdate($data, $id)
    {
        $updateRule = static::$rules;
        $updateRule['title'] = 'required|unique:cw_user_group,title,' . $id . ',id';
        return Validator::make($data, $updateRule);
    }

    /* Relations */
    public function user()
    {
        return $this->hasMany('App\User', 'group_id');
    }
}
