<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Requests\StoreNewsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsPoliticController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $news = DB::table('news')
        ->orderBy('created_at', 'desc')
        ->limit(48)        
        ->join('types','types.id','=','news.type_id')
        ->join('users','users.id','=','news.user_id')
        ->select('news.id','news.title','news.subtitle','news.body','news.file','news.created_at','types.name as type_id','users.name as autor')
        ->where('news.type_id', '=', 8)
                
        ->get();
        //return $news;        
        return view('news.politic')->with('news', $news);
    }
}
