<?php

include '../../../_library/dbconnect.php';

if (isset($_POST['submit'])) {

  $searchterm = $_POST['searchterm'];

  $getmsg = "Select * from chatmessages where message like '%$searchterm%' order by postime desc";

  $getmsg2 = mysqli_query($getmsg) or die("Could not get messages");

  print "<table border='1' width='100%'><tr><td>Name of poster</td><td>IP</td><td>Message</td><td>Edit</td><td>Delete</td></tr>";

  while ($getmsg3 = mysqli_fetch_array($getmsg2)) {

    print "<tr><td valign='top'>$getmsg3[name]</td><td valign='top'>$getmsg3[IP]</td><td valign='top'>$getmsg3[message]</td><td valign='top'><A     href='editm.php?ID=$getmsg3[ID]'>Edit</a></td><td valign='top'><A href='delete.php?ID=$getmsg3[ID]'>Delete</a></td></tr>";
  }

  print "</table>";

  print "<hr /><p align='center'><a href='clearhistory.php?action=clear'><<< Clear ALL >>></a></p><hr />";
  print "<br /><a href='index.php'>back</a>";
} else {

  print "<form action='editdelete.php' method='post'>";

  print "Search for messages(leaving blank will return all messages:<br>";

  print "<input type='text' name='searchterm' size='20'><br>";

  print "<input type='submit' name='submit' value='submit'></form>";
  print "<br /><a href='index.php'>back</a>";
}
