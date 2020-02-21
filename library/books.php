<?php 
/*
   books.php
   Author: Arthur Dherbomez
   Create the: 20/02
   Description: Index of the e-Library, call all the different request and form to load the page
*/
session_start();
if ($_SESSION['login'] == null) 
{
  header('location: login.php');
}
else
{ 
require_once('functions.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Library</title>
</head>
<body>
  <?php 
    /*
      Display who is loggin in the page
    */
    echo "Session :".$_SESSION['login']; 
  ?>
  <center>
    <h1>Welcome to the e-Library</h1>
      <?php 
        /*
          Button to logged out
        */
        echo"<a href='login.php'><input type='submit' name='btnLoggedOut' value='Logged out'></a>"; 
      ?>
    <h2>Research</h2>
      <?php

          generateForm();
          require_once('research.php');
          /*
            give the access to the user of all the e-library
          */
          if($_SESSION['privilege'] == 1)
          {
            echo "<h3> You're greated all the access to this page! <h3>";
      ?>

    <h2>Delete</h2>
    <table>
      <thead>
        <tr>
          <th>Author</th>
          <th>Title</th>
          <th>Publisher</th>
          <th>Year</th>
        </tr>
      </thead>

      <?php
        $array_index = array("author","title","publisher","year");
        $query = getBooksRequest();
          while($row = $query->fetch())
          /*
            Generate the table of all delete request
          */
          {
            echo"
                <tr>";
                generateTable($array_index,$row);
                  echo "
                    <td>
                      <form method='post' action='delete.php'>
                        <input type='hidden' name='id' value=".$row["id"].">
                        <input type='submit' name='btnDel' value='Supprimer'>
                    </form>
                    </td>
                </tr>";
          }
      ?>
    </table>
    <h2>Insert</h2>
      <?php
            /*
              Generate the insert's form
            */
          generateForm();
          require_once('insert.php');
            }
            else
            {
              echo "<h3> You're not allow to access this page !</h3>";
            }
          }
      ?>
  </center>
</body>
</html>
