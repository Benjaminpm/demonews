<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    protected $fillable = ['name', 'country_id'];


    public static function regions($id){
    	return Region::where('country_id','=',$id)
    	->get();
    }
}
