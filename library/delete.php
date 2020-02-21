<?php
/*
   delete.php
   Author: Arthur Dherbomez
   Create the: 20/02
   Description: Allow the delete of a row in the bdd table request
*/
require_once('controller.php');

  if (!empty($_POST['id']) && is_numeric($_POST['id']))
  {
    //id of the row who contain author, title, publisher and year
    $id = $_POST['id'];

    getDeleteRequest($id);
    header ('location: books.php');

  }
  else {
    echo "Error delete";
  }

 ?>
