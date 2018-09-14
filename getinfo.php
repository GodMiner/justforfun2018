<?php
 error_reporting(E_ALL);
include 'medoo.php';


// Using Medoo namespace
use Medoo\Medoo;
 
$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'phonedata',
	'server' => '127.0.0.1',
	'username' => 'root',
	'password' => 'root',
 
	// [optional]
	'charset' => 'utf8',
	'port' => 3306,
 
	// [optional] Table prefix
	'prefix' => '',
 
	// [optional] Enable logging (Logging is disabled by default for better performance)
	'logging' => true,
 
	// [optional] MySQL socket (shouldn't be used with server and port)
	'socket' => '/tmp/mysql.sock',
 
	// [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	],
 
	// [optional] Medoo will execute those commands after connected to the database for initialization
	'command' => [
		'SET SQL_MODE=ANSI_QUOTES'
	]
]);
 
// $database->insert("account", [
// 	"user_name" => "foo",
// 	"email" => "foo@bar.com"
// ]);

// $database->insert("datatest", [
// 	"Name" => "xxxxxx",
//     "Money" => "$10000",
//     "payment_method" => "中國銀行",
//     "Time" => "2222 2-22 22：22",
//     "User" => "二貨" 
// ]);


$datas = $database->select("phoneinfo",
["deviceid","ip", "city", "manf", "model", "version","lastlogintime","isconnected","isdatarenew"]
);

#var_dump($datas);

echo(json_encode($datas));


// foreach($datas as $data)
// {
//     echo $data["Name"] ;
//     echo $data["Money"];
// }

?>
