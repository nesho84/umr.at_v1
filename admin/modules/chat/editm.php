<?php

include '../../../_library/dbconnect.php';

if (isset($_POST['submit'])) {

  $ID = $_POST['ID'];

  $themessage = $_POST['themessage'];

  $updatemsg = "Update chatmessages set message='$themessage' where ID='$ID'";

  mysqli_query($updatemsg) or die("Could not get message");

  print "Message updated.";
  print "<br /><a href='index.php'>back</a>";
} else {

  $ID = $_GET['ID'];

  $getmessage = "SELECT *  from chatmessages where ID='$ID'";

  $getmessage2 = mysqli_query($getmessage) or die("Could not get message");

  $getmessage3 = mysqli_fetch_array($getmessage2);

  print "<form action='editm.php' method='post'>";

  print "<input type='hidden' name='ID' value='$ID'>";

  print "<textarea name='themessage' rows='5' cols='50'>$getmessage3[message]</textarea><br><br>";

  print "<input type='submit' name='submit' value='submit'></form>";
  print "<br /><a href='index.php'>back</a>";
}
