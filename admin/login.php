<?php
session_start();
if (isset($_SESSION['name']))
{
header('Location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Login</title>
<link href="styles/default.css" rel="stylesheet" type="text/css" />

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
input {
width: 500px;
height: 90px;
font-size: 50px;
}
.submit {
width: 507px;
height: 90px;
}
p{
padding: 0px;
margin: 0;
text-align: left;
font-size: 30px;
}
</style>
</head>

<body>
  <div id="header2">
  
<div id="logo">
<span style="color:#C69C6D; text-align:center;">NN WEBS</span>
</div>
   <!-- end #header --></div>
   <hr color="#ccccff" style="margin-top: -2px;" />
<h2 align="center">&nbsp;</h2>
<br />
<form id="form1" name="form1" method="post" action="check_login.php"><!-- Check Login FORM -->
<table border="0" align="center" class="bigbox" cellpadding="5" cellspacing="5">

<tr>
<td>
<h4 align="center" style="color:red; font-size: 35px;">::Administration Login page::</h4><hr color="#ccccff" style="margin-top: -5px;" />
</td>
</tr>
<tr>
<td><p>Username :</p></td>
</tr>
<tr>
<td><label for="u_name"></label><input type="text" name="u_name" id="u_name" /></td>
</tr>
<tr>
<td><p>Password :</p></td>
</tr>
<tr>
<td><label for="pass"></label><input type="password" name="pass" id="pass" /></td>
</tr>
<tr>
<td><p align="center"><input type="submit" name="submit" class="submit" id="submit" value="Login" /></p></td>
</tr>
</table>
</form>
</body>
</html>