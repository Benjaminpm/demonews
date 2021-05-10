<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'Types';

    protected $fillable = ['name','news_id'];


    public static function types($id){
    	return Types::where('news_id','=',$id)
    	->get();
    }
}
