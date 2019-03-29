<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class CustomerRole extends Model
{
    protected $table = 'cw_customer_role';
    protected $primaryKey = 'id';
    protected $fillable = ['role'];
    public static $rules = array('role' => 'required|unique:cw_customer_role'
    );

    public static function validateUpdate($data, $id)
    {
        $updateRule = static::$rules;
        $updateRule['role'] = 'required|unique:cw_customer_role,role,' . $id . ',id';
        return Validator::make($data, $updateRule);
    }

    /* Relations */
    public function customer()
    {
        return $this->hasMany('App\Customer', 'role_id');
    }
}
