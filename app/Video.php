<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Video extends Model
{
    protected $table = 'cw_video';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'youtube_video_url', 'status'];
    public static $rules = array(
        'title' => 'required',
        'youtube_video_url' => 'required',
    );
    public static function validateUpdate($data, $id)
    {
        $updateRule = static::$rules;
        $updateRule['title'] = 'required';
        $updateRule['youtube_video_url'] = 'required';
        return Validator::make($data, $updateRule);
    }
}