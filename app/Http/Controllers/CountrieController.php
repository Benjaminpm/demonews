<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Countrie;
use App\Region;
use App\Citie;
use App\Type;
use Illuminate\Support\Facades\DB;
class CountrieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $countries = Countrie::pluck('name','id');
        $types = Type::pluck('name','id');        
        return view('create',compact('countries', 'types'));
        //return view('create')->with('countries', $countries);
        //return view('newss.create')->with('countries', $countries);
        /*var_dump($countries);
        add($countries);*/
    }

    public function getRegions(Request $request, $id){
        if($request->ajax()){
            $regions = Region::regions($id);
            return response()->json($regions);
        }
    }
    public function getCities(Request $request, $id){
        if($request->ajax()){
            $cities = Citie::cities($id);
            return response()->json($cities);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
