<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Create;
use Illuminate\Http\Request;
use App\Userorient;
//require "../PhpOrient/vendor/autoload.php";
//require "../PhpOrient/vendor/autoloadconex.php";
use PhpOrient\PhpOrient;

class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('create');//news
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return view('create');//news
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new PhpOrient();
        // CONFIGURE CLIENT
        $client->configure(array(
            'username'    => 'root',
            'password'    => '12345',
            'hostname'    => 'localhost',
            'port'        => 2424));
        $client->connect();

        $data = $request->validate([
            'country' => ['required', 'string', 'min:2', 'max:255'],
            'state' => ['required', 'string', 'min:2', 'max:255'],
            'city' => ['required', 'string', 'min:2', 'max:255'],
            'title' => ['required', 'string', 'min:2', 'max:255'],
            'subtitle' => ['required', 'string', 'min:2', 'max:255'],
            'body' => ['required', 'string', 'min:2', 'max:10000'],
        ]);
        /*$pastel = new Pastel;
        $pastel->nombre = $request->input('nombre');
        $pastel->sabor  = $request->input('sabor');

        $pastel->save();

        return redirect()->route('pasteles.index');*/

        /*$request=[
            'country' => ['required', 'string', 'min:2', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'title' => ['required', 'min:10', 'max:255'],
            'subtitle' => ['required', 'string', 'min:10', 'max:255'],
            'body' => ['required', 'string', 'min:10', 'max:10000'],
        ];*/
        //$variable=$nombrearray[1];
        //
        //$data='';


        /*$data=array([
            'country' => $data['country'],
            'city' => $data['city'],
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'body' => $data['body'],
        ]);*/
        //var_dump($data);               
        $country=$data['country'];
        //($data['country']);
        $state=$data['state'];
        $city=$data['city'];
        $title=$data['title'];
        $subtitle=$data['subtitle'];
        $body=$data['body'];
        if (!$client->dbExists('news')){
            $new_cluster_id = $client->dbCreate('news');
            $client->dbOpen('news', 'root', '12345');
            $client->command('create class news extends V');
            //Insert Propertys
            $client->command("insert into news set country = '$country', state = '$state', city = '$city', title = '$title', subtitle = '$subtitle', body = '$body'");
        }else{
            $client->dbOpen('news', 'root', '12345');
            //$client->command('create class news extends V');
            $client->command("insert into news set country = '$country', state = '$state', city = '$city', title = '$title', subtitle = '$subtitle', body = '$body'");
        }
        //$animal = $client->query( "select * from users" );
        //echo "todo okey";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\create  $create
     * @return \Illuminate\Http\Response
     */
    public function show(create $create)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\create  $create
     * @return \Illuminate\Http\Response
     */
    public function edit(create $create)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\create  $create
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, create $create)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\create  $create
     * @return \Illuminate\Http\Response
     */
    public function destroy(create $create)
    {
        //
    }
}
