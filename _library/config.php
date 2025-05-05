<?php
// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
  ob_start();
  session_start();
}

//connect to database
require_once __DIR__ . '/dbconnect.php';
/*
	Configuration
*/
ini_set('display_errors', 'On');
error_reporting(E_ALL);
ini_set("log_errors", TRUE);
ini_set("error_log", dirname(__DIR__) . "/logs/server.log");

// Variables to include and upload files
$siteRoot = $_SERVER['DOCUMENT_ROOT'] . '/umr.at_v1/';
$admRoot = $_SERVER['DOCUMENT_ROOT'] . '/admin/';

defined('SITE_URL')
  or define('SITE_URL', 'http://localhost/umr.at_v1');

defined('IMAGE_URL')
  or define('IMAGE_URL', SITE_URL . '/_images');

defined('STYLE_URL')
  or define('STYLE_URL', SITE_URL . '/_css');

defined('UPLOAD_DIR')
  or define('UPLOAD_DIR', $siteRoot); //Upload Dir

//Define Website Name
defined('WEB_NAME')
  or define('WEB_NAME', '<a href=http://localhost>umr.at_v1</a>');

//SECURE $_GET $_POST VARIABLES
// if(!get_magic_quotes_gpc())
// {
//   $_GET = array_map('mysqli_real_escape_string', $_GET);

//   $_POST = array_map('mysqli_real_escape_string', $_POST);

//   //$_COOKIE = array_map('mysqli_real_escape_string', $_COOKIE);
// }
// else
// {
//    $_GET = array_map('stripslashes', $_GET);

//    $_POST = array_map('stripslashes', $_POST);

//    $_COOKIE = array_map('stripslashes', $_COOKIE);

//    $_GET = array_map('mysqli_real_escape_string', $_GET);

//    $_POST = array_map('mysqli_real_escape_string', $_POST);

//    $_COOKIE = array_map('mysqli_real_escape_string', $_COOKIE);
// }
