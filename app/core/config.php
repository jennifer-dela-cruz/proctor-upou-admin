<?php
/*****************************************************/
/* Sets the DB connection, website title,            */
/* Protocol, debugging config, root, and asset paths */
/*****************************************************/

//  set your website title
define('WEBSITE_TITLE', "Admin Portal");

//  set database variables
define('DB_TYPE','mysql');
define('DB_NAME','moodle');
define('DB_USER','root');
define('DB_PASS','HAMHAM123');
define('DB_HOST','ec2-3-209-162-86.compute-1.amazonaws.com');

// protocol type http or https
define('PROTOCAL','http');

// root and asset paths
$path = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/core", "public", $path));
define('ASSETS', str_replace("app/core", "public/assets", $path));

// set to true to allow error reporting
// set to false when you upload online to stop error reporting
define('DEBUG',true);

if(DEBUG)
{
	ini_set("display_errors",1);
}else{
	ini_set("display_errors",0);
}





