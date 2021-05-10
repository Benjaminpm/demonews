<?php

namespace App\Http\Controllers\Auth;


use App\User;
use App\Admin;
use App\Blogger;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
//use App\Userorient;
//require "../PhpOrient/vendor/autoload.php";
//require "../PhpOrient/vendor/autoloadconex.php";
//use PhpOrient\PhpOrient;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //$this->middleware('guest'); Linea original
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:blogger');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:12', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBloggerRegisterForm()
    {
        return view('auth.register', ['url' => 'blogger']);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createBlogger(Request $request)
    {
        $this->validator($request->all())->validate();
        Blogger::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/blogger');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }    



    protected function createOrient(array $data)
    {

        return Userorient::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        $client = new PhpOrient();
        // CONFIGURE CLIENT
        $client->configure(
            array(
                'username'    => 'root',
                'password'    => 'root_passwd',
                'hostname'    => 'localhost',
                'port'        => 2424));
        $client->connect();
        if (!$client->dbExists('crud1')){
            $new_cluster_id = $client->dbCreate('crud1');
            $client->dbOpen( 'crud1', 'root', '12345' );
            $client->command( 'create class users extends V' );
            $client->command( "insert into users set name = 'lucia', specie = 'human'" );
        }else{
            $client->dbOpen('crud1', 'root', '12345');
            //$client->command('create class users extends V');
            $client->command("insert into users set name = 'lucia', specie = 'human'"); 
        }
        $animal = $client->query( "select * from users" );
        echo "todo okey";
    }
    
    // INITIALIZE CLIENT
    //public $client = new PhpOrient();

    // CONFIGURE CLIENT
    //public $client->connect();
    
    // INITIALIZE CLIENT
    
}
