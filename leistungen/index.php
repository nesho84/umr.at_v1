<?php //function for all pages that are loaded in main content

$p = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : '';

switch ($p) {
case "baureinigung":
include("baureinigung.php");
break;

case "buroreinigung":
include("buroreinigung.php");
break;

case "fassadenreinigung":
include("fassadenreinigung.php");
break;

case "fensterreinigung":
include("fensterreinigung.php");
break;

case "hauswartungen":
include("hauswartungen.php");
break;

case "sonderreinigungen":
include("sonderreinigungen.php");
break;

case "teppichreinigung":
include("teppichreinigung.php");
break;

case "umzugsreinigung":
include("umzugsreinigung.php");
break;

case "unterhaltsreinigung":
include("unterhaltsreinigung.php");
break;

default: 
include("leistungen.php");
break;
}

?>