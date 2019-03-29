<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Customer extends Model
{
    protected $table = 'cw_customer';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'business_name', 'role_id', 'primary_phone', 'alternate_phone', 'address', 'city_village', 'district', 'taluk', 'area', 'pincode'];
    public static $rules = array(
        'role_id' => 'required',
        'name' => 'required',
        'primary_phone' => 'required',
        'address' => 'required',
        'city_village' => 'required',
        'district' => 'required',
        'taluk' => 'required',
        'area' => 'required',
        'pincode' => 'required'
    );

    public static function validateUpdate($data, $id)
    {
        $updateRule = static::$rules;
        $updateRule['role_id'] = 'required';
        $updateRule['name'] = 'required';
        $updateRule['primary_phone'] = 'required';
        $updateRule['address'] = 'required';
        $updateRule['city_village'] = 'required';
        $updateRule['district'] = 'required';
        $updateRule['taluk'] = 'required';
        $updateRule['area'] = 'required';
        $updateRule['pincode'] = 'required';
        return Validator::make($data, $updateRule);
    }

    /* Relations */
    public function customer_role()
    {
        return $this->belongsTo('App\CustomerRole', 'role_id');
    }
}
