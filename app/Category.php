<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Category extends Model
{
    protected $table = 'cw_category';
    protected $primaryKey = 'id';
    protected $fillable = ['category', 'parent_id', 'image', 'status'];
    public static $rules = array(
        'category' => 'required',
        'parent_id' => 'required',
    );
    public static function validateUpdate($data, $id)
    {
        $updateRule = static::$rules;
        $updateRule['category'] = 'required';
        $updateRule['parent_id'] = 'required';
        return Validator::make($data, $updateRule);
    }
}