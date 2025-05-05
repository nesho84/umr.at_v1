<?php
require_once 'config.php';

$dbConn = mysql_connect($dbHost, $dbUser, $dbPass) or die('MySQL connect failed. ' . mysqli_error($con));
mysql_select_db($dbName) or die('Cannot select database. ' . mysqli_error($con));

function dbQuery($sql)
{
	$result = mysqli_query($sql) or die(mysqli_error($con));

	return $result;
}

function dbAffectedRows()
{
	global $dbConn;

	return mysql_affected_rows($dbConn);
}

function dbFetchArray($result, $resultType = MYSQLI_NUM)
{
	return mysqli_fetch_array($result, $resultType);
}

function dbFetchAssoc($result)
{
	return mysql_fetch_assoc($result);
}

function dbFetchRow($result)
{
	return mysql_fetch_row($result);
}

function dbFreeResult($result)
{
	return mysql_free_result($result);
}

function dbNumRows($result)
{
	return MYSQLI_NUM_rows($result);
}

function dbSelect($dbName)
{
	return mysql_select_db($dbName);
}

function dbInsertId()
{
	return mysql_insert_id();
}
