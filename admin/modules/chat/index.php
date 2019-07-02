<?php
include '../../output.php';

do_html_header('Links');
?>
<style type="text/css">
body {
background: #FFFFFF;
}
body h2 {
color: #EE4902;
}
#form1 p {
color: #EE4902;
}
.para {
color: #F00;
}
</style>
<table width="960" align="center" border="0" cellpadding="3" cellspacing="1">
<?php

print "<tr>";
print "<td><iframe src='chatlog.php'  name='chatlogframe' width=500' height='300'></iframe></td>";
print "</tr>";
print "<br><br>";

print "<tr>";
print "<td><iframe src='submit.php' width='500' height='250' frameborder='0'></iframe></td>";
print "</tr>";

print " <a href='editdelete.php'>edit - delete</a> |";
print " <a href='banip.php'>ban ip</a> |";
print " <a href='unbanip.php'>unban ip</a><br /><br />";

print "</table>";

do_html_footer();
?>