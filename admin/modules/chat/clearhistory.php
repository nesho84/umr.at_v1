<?php
include '../../../_library/dbconnect.php';

if (isset($_POST['Clear'])) {

   $action = ($_POST['action']);

   $clearmessages = "TRUNCATE TABLE chatmessages";

   mysqli_query($clearmessages) or die("Could not clear History");

   print "History Cleared.";
   print "<br /><a href='index.php'>back</a>";
} else {

   $action = $_GET['action'];

   print "<form action='clearhistory.php' method='post'>";

   print "Are you sure you want to clear this CHAT History?<br>";

   print "<input type='hidden' name='action' value='$action'>";

   print "<input type='submit' name='Clear' value='Clear'></form>";
}
