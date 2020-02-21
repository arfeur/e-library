<?php 
/*
   insert.php
   Author: Arthur Dherbomez
   Create the: 20/02
   Description: Insert the request in the database
*/
require_once('controller.php');

if(!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['publisher']) && !empty($_POST['year']))
{
  $author=$_POST['author'];
  $title=$_POST['title'];
  $publisher=$_POST['publisher'];
  $year=$_POST['year'];

  getInsertRequest($author,$title,$publisher,$year);
  // wait 3 sec and reload books.php
  echo "Livre inséré. Vous allez être redirigé <meta http-equiv=\"refresh\"content=\"3;URL=books.php\">";
}
 ?>
