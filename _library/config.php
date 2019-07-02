<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

//connect to database
require_once 'dbconnect.php';

//Define Website Name
define('WEB_NAME', '<a href=http://localhost>umr.at</a>');

// Variables to include and upload files
$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT']. '';
$admRoot = $_SERVER['DOCUMENT_ROOT']. '/admin/';

// define paths
$webRoot  = str_replace(array($docRoot, '/_library/config.php'), '', $thisFile);
$srvRoot  = str_replace('/_library/config.php', '', $thisFile);

//define('ABSPATH', dirname(__FILE__) . '/');
define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'); //Apsolute site path
define('ADM_URL', 'http://'.$_SERVER['HTTP_HOST'].'/admin/');
define('IMAGE_DIR', 'http://'.$_SERVER['HTTP_HOST'].'/_images/');
define('STYLE_DIR', SITE_URL . 'styles');
define('UPLOAD_DIR', $docRoot); //Upload Dir

//SECURE $_GET $_POST VARIABLES 
if(!get_magic_quotes_gpc())
{
  $_GET = array_map('mysqli_real_escape_string', $_GET); 

  $_POST = array_map('mysqli_real_escape_string', $_POST); 

  //$_COOKIE = array_map('mysqli_real_escape_string', $_COOKIE);
}
else
{  
   $_GET = array_map('stripslashes', $_GET); 

   $_POST = array_map('stripslashes', $_POST); 

   $_COOKIE = array_map('stripslashes', $_COOKIE);

   $_GET = array_map('mysqli_real_escape_string', $_GET); 

   $_POST = array_map('mysqli_real_escape_string', $_POST); 

   $_COOKIE = array_map('mysqli_real_escape_string', $_COOKIE);
}
?>