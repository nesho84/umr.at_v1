<?php
include '../../../_library/config.php';
include '../../includes/session.php';
include '../../../_library/dbconnect.php';


if(isset($_POST['submit'])) //if submit button push has been detected

{

   $message=$_POST['message'];

   $name=$_SESSION['name'];

   if(strlen($message)<1)

   {

      print "You did not input a message";

   }

   else if(strlen($name)<1)

   {

      print "You did not enter a name, please try again.";

   }

   else

   {

      $message=strip_tags($message);

      $IP=$_SERVER["REMOTE_ADDR"]; //grabs poster's IP

      $checkforbanned="SELECT IP from ipbans where IP='$IP'";

      $checkforbanned2=mysql_query($checkforbanned) or die("Could not check for banned IPS");

      if(mysql_num_rows($checkforbanned2)>0) //IP is in the banned list

      {

         print "You IP is banned from posting.";

      }

      else

      {

         $thedate = date("U"); //grab date and time of the post

         $insertmessage="INSERT into chatmessages (name,IP,postime,message) values('$name','$IP','$thedate','$message')";

         mysql_query($insertmessage) or die("Could not insert message");

    



      }

   }

 

      

}

print "<form action='submit.php' method='post' name='form'>";

print "Your name: ";

print "<b>$_SESSION[name]</b><br><br>";

print "Your message:<br>";

print "<textarea name='message' cols='55' rows='3'></textarea><br><br>";

print "<a onClick=\"addSmiley(':)')\"><img src='images/smile.gif'></a> "; //replace images/smile.gif with the relative path of your smiley

print "<a onClick=\"addSmiley(':(')\"><img src='images/sad.gif'></a> &nbsp;&nbsp;";

print "<a onClick=\"addSmiley(';)')\"><img src='images/wink.gif'></a> &nbsp;&nbsp;&nbsp;&nbsp;";

print "<input type='submit' name='submit' value='submit'></form>";

print "<script language=\"Java Script\" type=\"text/javascript\">\n";

print "function addSmiley(textToAdd)\n";

print "{\n";

print "document.form.message.value += textToAdd;";

print "document.form.message.focus();\n";

print "}\n";

print "</script>\n";

print "<br><br>";

?> 
