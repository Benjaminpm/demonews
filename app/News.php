<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['title', 'subtitle', 'body', 'file', 'type_id', 'country_id', 'region_id', 'city_id', 'user_id'];    
}
