<h1>Page not found</h1>
<?php
/* Error 404 code for ***** website */

$webmaster = "webmaster@camrider.com";
$host     = getenv("REMOTE_HOST");
$referrer = getenv("HTTP_REFERER"); 
$path     = getenv("REQUEST_URI"); 

// time in this format: 13/Nov/2000:10:50:38
$time = strftime("%d/%b/%Y:%T");

if ($referrer == "") {
  $referrer = "";
} else {
  $referrer = "<p>You came to this page from $referrer, this could be a broken link so please <a href=\"mailto:$webmaster?subject=Error 404 on $path from $referrer\">email the webmaster</a> to inform us of this.</p>";
}


?>
<h2>Sorry, we couldn't find the page <?php echo $path ?> on this website</h2>
<?php echo $referrer; ?>
<p>Please use the navigation links to help locate what you're looking for.</p>
