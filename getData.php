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


$deviceid = $_GET['deviceid'];
$col = $_GET['col'];

switch ($col) {
	case 0:
		$msg = "contact";
		break;
	case 1:
		$msg = "calllogs";
		break;
	case 2:
		$msg = "smsrecv";
		break;
	case 3:
		$msg = "smssend";
		break;
	case 4:
		$msg = "gps";
		break;
	default:
		$msg = "unkown";
		break;

}



$datas = $database->select(
	"phonedata",
	[$msg],
	["deviceid" => $deviceid]
);

//var_dump($datas[0]);
$contactlist = $datas[0][$msg];
//echo $contactlist;
$start = strpos($contactlist, '[');
$end = strpos($contactlist, ']');
$len = $end - $start + 1;
$infolist = substr($contactlist, $start, $len);
echo $infolist;
// $jsondata = json_encode($infolist);

// echo $jsondata;

// echo json_decode($jsondata)['contactlist'];
// echo gettype($jsondata);


// foreach($datas as $data)
// {
//     echo $data["Name"] ;
//     echo $data["Money"];
// }

?>
