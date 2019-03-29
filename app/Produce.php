<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Produce extends Model
{
    protected $table = 'cw_produce';
    protected $primaryKey = 'id';
    protected $fillable = ['customer_id', 'category_id', 'selling_unit_id', 'produce_name', 'grade_quality', 'unit_price', 'available_quantity', 'details', 'image1', 'image2', 'image3',
    'contact_name', 'contact_number', 'whatsapp_number', 'address1', 'address2', 'city_village', 'district', 'taluk', 'area', 'pincode', 'state_id'];
    public static $rules = array(
        'customer_id' => 'required',
        'category_id' => 'required',
        'selling_unit_id' => 'required',
        'produce_name' => 'required',
        'grade_quality' => 'required',
        'unit_price' => 'required',
        'available_quantity' => 'required'
    );

    public static function validate_update($data, $id)
    {
        $updateRule = static::$rules;
        $updateRule['customer_id'] = 'required';
        $updateRule['category_id'] = 'required';
        $updateRule['selling_unit_id'] = 'required';
        $updateRule['produce_name'] = 'required';
        $updateRule['grade_quality'] = 'required';
        $updateRule['unit_price'] = 'required';
        $updateRule['available_quantity'] = 'required';
        return Validator::make($data, $updateRule);
    }

    /* Relations */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function selling_unit()
    {
        return $this->belongsTo('App\SellingUnit', 'selling_unit_id');
    }
}
