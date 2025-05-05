<?php
include '../../../_library/dbconnect.php';

if (isset($_POST['submit'])) {

   $ID = $_POST['ID'];

   $delmessage = "Delete from chatmessages where ID='$ID'";

   mysqli_query($delmessage) or die("Could not delete message");

   print "Message Deleted.";
   print "<br /><a href='index.php'>back</a>";
} else {

   $ID = $_GET['ID'];

   print "<form action='delete.php' method='post'>";

   print "Are you sure you want to delete this message?<br>";

   print "<input type='hidden' name='ID' value='$ID'>";

   print "<input type='submit' name='submit' value='Delete'></form>";
}
