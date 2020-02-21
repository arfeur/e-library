<?php
/*
   research.php
   Author: Arthur Dherbomez
   Create the: 20/02
   Description: Research the request in the database
*/
  require_once('bddConnection.php');
  require_once('controller.php');

  // Request execution
  $bdd = connectionBDD();
  $request = getResearchRequest();
  // Recover the data of title
  if (isset($_POST['title']) || isset($_POST['author']) || isset($_POST['publisher']) || isset($_POST['year']))
    {
      // Data of the form
      $title = $_POST['title'];
      $author = $_POST['author'];
      $publisher = $_POST['publisher'];
      $year = $_POST['year'];

        // Prepare the request with the informations of the form
        $informations= $bdd->prepare("SELECT author, title FROM books WHERE author LIKE ? AND title LIKE ? AND publisher LIKE ? AND year LIKE ?");
        $informations->execute(array('%'.$author."%",'%'.$title."%",'%'.$publisher."%",'%'.$year."%"));
          while($row = $informations->fetch())
          {
              echo "Author: ".$row["author"], "Title: ".$row["title"]."<br/>";
          }
    }
    else
    {
      while($row = $request->fetch())
      {
        echo "Author: ".$row["author"]."<br/>", "Title: ".$row["title"]."<br/>";
      }
    }



?>
