<?php
// database connection config
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '123456';
$dbname = 'd0147235';
global $con;

/*
connecting to mysql database
*/
$con = mysqli_connect($dbhost,$dbuser,$dbpass);
if(!$con)
{
die("Connection to database failed".mysql_error());
}

/* selecting the database "dbname" */
$dataselect = mysqli_select_db($con,$dbname);
if(!$dataselect)
{
die("Database namelist not selected".mysqli_error());
}
?>