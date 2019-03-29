<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class SellingUnit extends Model
{
    protected $table = 'cw_selling_unit';
    protected $primaryKey = 'id';
    protected $fillable = ['unit'];
    public static $rules = array('unit' => 'required|unique:cw_selling_unit'
    );

    public static function validate_update($data, $id)
    {
        $updateRule = static::$rules;
        $updateRule['unit'] = 'required|unique:cw_selling_unit,unit,' . $id . ',id';
        return Validator::make($data, $updateRule);
    }

    /* Relations */
    public function produce()
    {
        return $this->hasMany('App\Produce', 'selling_unit_id');
    }
}
