<?php
/*
*error reporting
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL | E_STRCT);


$config = array(
	"db" => array(
		"mysql" => array(
			"dbname" => "database1",
			"username" => "dbuser",
			"password" => "pass",
			"host" => "localhost",
		),
		"db2" => array(
			"dbname" => "database1",
			"username" => "dbuser",
			"password" => "pass",
			"host" => "localhost",
		)
	),
	"urls" => array(
		"baseUrl" => "http://localhost/readit"
	),

	"paths" => array(
		"resources" => "../resources",

		"images" => array(
			"cover" => "public/assets/images/cover",
			"logo" => "public/assets/images/logo",
			"content" => "public/assets/images/content",
			"upload" => "public/assets/images/upload"
		)
	)

);

/**
 * Important constants
 * ex. require_once(LIBRARY_PATH. ""Paginator.php)
 */

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","contest");



//System files url
defined("LIBRARY_PATH")
	or define("LIBRARY_PATH", '../src/lib');
		
defined("TEMPLATES_PATH")
	or define("TEMPLATES_PATH", '../resources/templates');

defined("PublicDir")
	or define("PublicDir", $config['urls']['baseUrl'].'/public');

//assets files url
define("cover", $config['paths']['images']['cover']);
define("logo", $config['paths']['images']['logo']);
define("content", $config['paths']['images']['content']);
define("upload", $config['paths']['images']['upload']);

//End constant

?>