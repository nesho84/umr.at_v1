<?php
require_once dirname(__DIR__, 2) . '/includes/session.php';
include '../../output.php';

do_html_header('Users');
?>





<?php
if (isset($_GET['del_u'])) {
   $id = $_GET['del_u'];
   $query = "DELETE FROM login WHERE id = '$id'";
   mysqli_query($query) or die('Error : ' . mysqli_error(DBLINK));
?>
   <p><img src="<?= ADM_URL ?>/images/sucess.png" width="40" height="25" />UserID: <b><?php echo $id; ?></b> deleted Successfully</p>
<?php
}
?>





<br />
<table border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#999999" class="boxed">
   <?php
   $query = "SELECT id, user, password FROM login ORDER BY id";
   $result = mysqli_query(DBLINK, $query) or die('Error : ' . mysqli_error(DBLINK));
   ?>
   <tr align="" bgcolor="#D22020">
      <td colspan="2" align="center" height="40"><strong>USERS</strong></td>
   </tr>
   <tr align="center" bgcolor="#CCCCCC">
      <td><strong>Username</strong></td>
      <td><strong>Action</strong></td>
   </tr>
   <?php
   while (list($id, $user, $password) = mysqli_fetch_array($result, MYSQLI_NUM)) {
   ?>
      <tr bgcolor="#FFFFFF">
         <td height="30">
            <?php echo $user ?>
         </td>
         <td width="250" align="center">
            <?php
            if ($user == 'admin') {
               echo 'Access Denied';
            } else {
            ?>
               <a href="<?= ADM_URL ?>/modules/users/edit.php?id=<?php echo $id; ?>">change password</a>
               | <a href="javascript:delUser('<?php echo $id; ?>', '<?php echo $user; ?>');">delete</a>
            <?php
            }
            ?>
         </td>
      </tr>
   <?php
   }
   ?>
   <tr>
      <td align="center">&nbsp;</td>
      <td align="right">
         <input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add users&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='<?= ADM_URL ?>/modules/users/add.php';">
      </td>
   </tr>
</table>





<?php
require_once '../../includes/functions_js.js';

do_html_footer();
?>