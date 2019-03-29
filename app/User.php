<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Validator;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'cw_user';
    protected $primaryKey = 'id';
    protected $fillable = ['group_id', 'name', 'email', 'password', 'address', 'phone', 'reset_pwd_status','facebook_enabled','pinterest_enabled','twitter_enabled','youtube_enabled','linkedin_enabled','instagram_enabled','facebook_url','pinterest_url','twitter_url','youtube_url','linkedin_url','instagram_url'];
    public static $rules = array('email' => 'required|email|unique:mag_user',
        'name' => 'required',
    );

    public static function validateUpdate($data, $id)
    {
        $updateRule = static::$rules;
        $updateRule['email'] = 'required|email|unique:cw_user,email,' . $id . ',id';
        $updateRule['name'] = 'required';
        return Validator::make($data, $updateRule);
    }

    public static $superAdminRules = array('email' => 'required|email|unique:cw_user',
        'name' => 'required',
    );

    public static function superAdminUpdate($data, $id)
    {
        $updateRule = static::$superAdminRules;
        $updateRule['email'] = 'required|email|unique:cw_user,email,' . $id . ',id';
        $updateRule['name'] = 'required';
        return Validator::make($data, $updateRule);
    }

    /* Relations */
    public function user_group()
    {
        return $this->belongsTo('App\UserGroup', 'group_id');
    }
}
