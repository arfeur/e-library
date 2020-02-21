<?php
/*
   bddConnection.php
   Author: Arthur Dherbomez
   Create the: 20/02
   Description: Allow the connection of the bdd
*/
function connectionBDD()
{
	include('config.php');
	//Connection to the database
	try
	  {
	      $bdd = new PDO($dns,$user,$password);
	      return $bdd;
	  }
	catch (PDOException $e)
	  {
	      print "Erreur !: " . $e->getMessage() . "<br/>";
	      die();
	  }
}
 ?>
