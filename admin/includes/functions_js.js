<script language="JavaScript">
function delCategory(cat_id, cat_name)
{
   if (confirm("Are you sure you want to delete '" + cat_name + "'"))
   {
      window.location.href = 'index.php?del=' + cat_id;
   }
}

function delLinks(id, title)
{
   if (confirm("Are you sure you want to delete '" + title + "'"))
   {
      window.location.href = 'index.php?del_l=' + id;
   }
}

function delLinksCategory(cat_id, cat_name)
{
   if (confirm("Are you sure you want to delete '" + cat_name + "'"))
   {
      window.location.href = 'index.php?del_c=' + cat_id;
   }
}

function delArticle(id, title)
{
   if (confirm("Are you sure you want to delete '" + title + "'"))
   {
      window.location.href = 'index.php?del_a=' + id;
   }
}

function delArticleCategory(cat_id, cat_name)
{
   if (confirm("Are you sure you want to delete '" + cat_name + "'"))
   {
      window.location.href = 'index.php?del_c=' + cat_id;
   }
}

function delNews(id, title)
{
   if (confirm("Are you sure you want to delete '" + title + "'"))
   {
      window.location.href = 'index.php?del_n=' + id;
   }
}

function delFirmen(firma_id, firma_name)
{
   if (confirm("Are you sure you want to delete '" + firma_name + "'"))
   {
      window.location.href = 'index.php?del_f=' + firma_id;
   }
}

function delUser(id, user)
{
   if (confirm("Are you sure you want to delete '" + user + "'"))
   {
      window.location.href = 'index.php?del_u=' + id;
   }
}

function delMembers(userID, username)
{
   if (confirm("Are you sure you want to delete '" + username + "'"))
   {
      window.location.href = 'index.php?del_members=' + userID;
   }
}

function clearData(username)
{
   if (confirm("Are you sure you want to clear Data '" + username + "'"))
   {
      window.location.href = 'index.php?clearData=' + username;
   }
}

function delMitarbeiter(userID, username)
{
   if (confirm("Are you sure you want to delete '" + username + "'"))
   {
      window.location.href = 'MitarbeiterLoschen/' + userID;
   }
}

//changed to direct delete from php
function delStunden(listeID, date, name, monat, jahr)
{
   if (confirm("Are you sure you want to delete '" + date + "'"))
   {
      window.location.href = 'view_liste.php?del_stunden=' + listeID + name + monat + jahr ;
   }
}

function delImage(id, image)
{
   if (confirm("Are you sure you want to delete '" + image + "'"))
   {
      window.location.href = 'index.php?del_i=' + id;
   }
}
</script>