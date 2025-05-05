<?php
require_once dirname(__DIR__, 3) . '/_library/config.php';
require_once dirname(__DIR__, 3) . '/_library/dbconnect.php';


$getnummessages = "SELECT COUNT(*) as messagecount from chatmessages";

$getnummessages2 = mysqli_query(DBLINK, $getnummessages) or die("blah");

$getnummessages3 = mysqli_fetch_assoc($getnummessages2)['messagecount'];

if ($getnummessages3 > 21) {

  $startrow = $getmessages3 - 20;
} else {

  $startrow = 1;
}

$getmsg = "SELECT name, message from chatmessages order by postime ASC limit $startrow,$getnummessages3";

$getmsg2 = mysqli_query(DBLINK, $getmsg) or die(mysqli_error(DBLINK));

while ($getmsg3 = mysqli_fetch_array($getmsg2)) {

  $message = Smiley(''); //Smiley faces

  print "<font color='red'><b>$getmsg3[name]:</b></font> $getmsg3[message]<br>";
}



function Smiley($texttoreplace)

{

  $smilies = array(





    ':)' => "<img src='images/smile.gif'>",

    ':blush' => "<img src='images/blush.gif'>",

    ':angry' => "<img src='images/angry.gif'>",

    ':o' =>     "<img src='images/shocked.gif'>",

    'fuck' => "$#$%",

    'Fuck' => "&$#@"





  );



  $texttoreplace = str_replace(array_keys($smilies), array_values($smilies), $texttoreplace);

  return $texttoreplace;
}

?>

<script>
  setTimeout("window.location.replace('chatlog.php')", 1000);
</script>