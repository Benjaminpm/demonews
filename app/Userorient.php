<?php

namespace App;

require "../PhpOrient/vendor/autoload.php";
require "../PhpOrient/vendor/autoloadconex.php";
use PhpOrient\PhpOrient;

use Illuminate\Database\Eloquent\Model;

class Userorient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

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
}
