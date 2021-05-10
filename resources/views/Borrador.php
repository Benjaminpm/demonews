//namespace App;

require "../PhpOrient/vendor/autoload.php";
require "../PhpOrient/vendor/autoloadconex.php";
use PhpOrient\PhpOrient;

/*$client = new PhpOrient();
$client->configure(array(
    'username' => 'root',
    'password' => '12345',
    'hostname' => 'localhost',
    'port'     => 2424,
));
$client->connect();*/

//$client->setSessionToken(true); // set true to enable the token based authentication

// ENABLE PERSISTENT CONNECTIONS
//$client->setSessionToken(true);

// RETRIEVE SESSION TOKEN
//$sessionToken = $client->getSessionToken();

//$new_cluster_id = $client->dbCreate('crud1'#,
    //PhpOrient::STORAGE_TYPE_MEMORY,   # optional, default: STORAGE_TYPE_PLOCAL
    //PhpOrient::DATABASE_TYPE_GRAPH    # optional, default: DATABASE_TYPE_GRAPH
//);


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
//add($animal);
//$client->dbExists('crud1');

/*

// OPEN OR CREATE DATABASE
function dbOpenCreate($dbname, $user, $passwd){
	//$dbname = 'crud1';
	//$user = 'root';
	//$passwd = '12345';

    // RETRIEVE GLOBAL CLIENT
    global $client;

    // CHECK IF EXISTS
    if (!$client->dbExists('crud1')){
        // CREATE DATABASE
        $client->dbCreate('crud1',
            PhpOrient::STORAGE_TYPE_PLOCAL,
            PhpOrient::DATABASE_TYPE_GRAPH);
    }
    return $client->dbOpen('crud1', 'root', '12345');
}
// Llamar a la función operaciones

$r = dbOpenCreate('crud1', 'root', 12345);

echo $r . "<br>";

// O podemos imprimir directamente


*/

//$client->dbList();


                    /*$text   = "\t\tThese are a few words  :) ...  ";
                    $binary = "\x09Example string\x0A";
                    $hello  = "Hello World";
                    var_dump($text, $binary, $hello);
                    echo "<br />";

                    print "\n";
                    echo "<br />";

                    $trimmed = trim($text);
                    var_dump($trimmed);
                    echo "<br />";

                    $trimmed = trim($text, " \t.");
                    var_dump($trimmed);
                    echo "<br />";

                    $trimmed = trim($hello, "Hdle");
                    var_dump($trimmed);
                    echo "<br />";

                    $trimmed = trim($hello, 'HdWr');
                    var_dump($trimmed);
                    echo "<br />";*/

                    /*echo date('h:i:s A');
                    echo "<br />";
                    echo date('h:i A');
                    echo " ";
                    //echo date(Y-m-d);
                    echo " ";
                    //echo datetime(Y-m-d H:00);*/
                

        <td>{{ $news_->created_at->format('j F, Y') }}</td>
        <br />
        {{ date('j F, Y', strtotime($news_->created_at)) }}
        <br />
        {{ \Carbon\Carbon::parse($news_->created_at)->format('j F, Y') }}
        <br />
        {{ date('d-m-Y', strtotime($news_->created_at)) }} 

        <div class="container">
                                      <h1 class="mt-3">Bootstrap 4 margin y padding clases</h1>
                                        <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-5 border">
                                            <p class="pt-5">Margin Top 0 (mt-0).</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-5 border">

                                            <p class="mt-1">Margin Top 1 (mt-1).</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-5 border">

                                            <p class="mt-2">Margin Top 2 (mt-2).</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-5 border">

                                            <p class="mt-3">Margin Top 3 (mt-3).</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-5 border">

                                            <p class="mt-4">Margin Top 4 (mt-4).</p>
                                          </div>
                                          <div class="col-sm-12 col-md-6 col-lg-6 mt-3 mb-5 border">

                                            <p class="mt-5">Margin Top 5 (mt-5).</p>
                                          </div></div>
                                </div> 
