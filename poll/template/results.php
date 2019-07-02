<?php

	/*
	 * You may customize this page with your own results message. 
	 */

?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Current Poll Results</title>
<link href="template/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>Aktuelle Umfrageergebnisse</h1>

<?php the_current_poll_results(); ?>

<p><a href="<?php the_return_to_url(); ?>">zurück zur Startseite</a></p>
</body>
</html>