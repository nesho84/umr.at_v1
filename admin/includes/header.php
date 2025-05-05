<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title><?php echo $title ?></title>
  <link href="<?php echo ADM_URL ?>/styles/default.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <div id="header">
    <div id="header2">

      <div id="logo">
        <span style="color:#C69C6D">NE</span>COM - <span style="color:#C69C6D">Admin</span>istration
        <span style="font-size: 18px; text-transform: none; color: #FFFFFF; font-weight: normal; padding-left: 360px;">Website: <a href="<?php echo WEB_NAME; ?>"><?php echo WEB_NAME; ?></a></span>
      </div>

      <div id="logout">
        <p>

          <?php
          echo "Welcome <span style=color:red;>[" . $_SESSION['name'] . "]</span>";
          ?>
          <span style="text-transform: none;">
            <a href="<?php echo ADM_URL ?>logout.php">
              &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout</a>
          </span>
        </p>
      </div>
      <p style="text-decoration: none; font-size: small;" align="left">
        <a href="<?php echo ADM_URL ?>modules/chat/" style="color: #ccccff;">| Admins CHAT |</a>
      </p>
    </div><!-- end #header2 -->

    <div id="headermenu">
      <div id="header1">
        <div id="toplinks">
          <ul>
            <li><a <?php if ($title == 'NNWEBS - Administration Panel') { ?>class="current" <?php } ?> href="<?php echo ADM_URL ?>">Home</a></li>

            <li><a <?php if ($title == 'Users') { ?>class="current" <?php } ?> href="<?php echo ADM_URL ?>modules/users/">Users Admin</a></li>

            <li><a <?php if ($title == 'News') { ?>class="current" <?php } ?> href="<?php echo ADM_URL ?>modules/news">News</a></li>

            <li><a <?php if ($title == 'Categories') { ?>class="current" <?php } ?> href="<?php echo ADM_URL ?>modules/categories/">Categories</a></li>

          </ul>
        </div> <!--toplinks -->
      </div>
    </div>

  </div> <!-- header ends -->
  <div id="main">