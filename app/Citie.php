<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
    protected $table = 'cities';

    protected $fillable = ['name', 'region_id'];


    public static function cities($id){
    	return Citie::where('region_id','=',$id)
    	->get();
    }
}
