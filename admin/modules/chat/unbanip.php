<?php

include '../../../_library/dbconnect.php';

if (isset($_POST['submit'])) {

   $ipselects = $_POST['ipselects'];

   $unban = "Delete from ipbans where ipid='$ipselects'";

   mysqli_query($unban) or die("Could not unban");

   print "IP Unbanned.";
   print "<br /><a href='index.php'>back</a>";
} else {

   print "<form action='unbanip.php' method='post'>";

   $getips = "SELECT * from ipbans";

   $getips2 = mysqli_query($getips) or die("Could not get IPS");

   print "<select name='ipselects'>";

   while ($getips3 = mysqli_fetch_array($getips2)) {

      print "<option value='$getips3[ipid]'>$getips3[IP]</option>";
   }

   print "</select><br>";

   print "<input type='submit' name='submit' value='submit'></form>";
   print "<br /><a href='index.php'>back</a>";
}
