<?php

include '../../../_library/dbconnect.php';

if(isset($_POST['submit']))

{

   $banip=$_POST['banip'];

   if(strlen($banip)<1)

   {

      print "You did not list an IP to Ban";

   }

   else

   {

      $ipban="Insert into ipbans (IP) values('$banip')";

      mysql_query($ipban) or die("Could not ban IP");

      print "Ip banned.";
	  print "<br /><a href='index.php'>back</a>";

   }



}

else

{

    print "<form action='banip.php' method='post'>";

    print "IP to Ban:<br>";

    print "<input type='text' name='banip' size='20'><br>";

    print "<input type='submit' name='submit' value='submit'></form>";
	print "<br /><a href='index.php'>back</a>";

}

?>