<?php
/*
   authentication.php
   Author: Arthur Dherbomez
   Create the: 20/02
   Description: Get back login's page information and allow the access to books.php.
*/
session_start();
require_once('controller.php');
/*
  Disconnect the previously user
*/
$currentpage = $_SERVER['REQUEST_URI'];
  if (strpos($currentpage, "login.php")) 
  {
    $_SESSION['login']=null;
    $_SESSION['privilege']=null;
  }
echo "Session :".$_SESSION['login'];

function verif()
{ 
  /*
    This function verify and redirect to books.php if form's informations are correct.
    Define the Session's variable, execute the request.
  */
  if(isset($_POST['login']) && isset($_POST['password']))
  {
    $login = $_POST['login'];
  	$password = $_POST['password'];

    $request = getAuthenticationRequest($login,$password);
    //get the login of the user
    $requestPrivilege = getPrivilegeRequest($login);
    $data_login = $request->fetchColumn(1);
    //get the password of the user
    $request = getAuthenticationRequest($login,$password);
    $data_password = $request->fetchColumn(2);
    //get privileges of the user
    $data_privilege = $requestPrivilege->fetchColumn(0);

    //verification of the data from the user
  		if($login == $data_login && $password == $data_password)
      {
        $_SESSION['login'] = $data_login;
        $_SESSION['privilege'] = $data_privilege;
        
        /*
          Use JavaScript for the redirection because header:('Location: books.php') doesn't work with external error
        */
        echo "<script type='text/javascript'>document.location.replace('books.php');</script>";
      }
      else
      {
        echo "Indentifiant ou mot de passe incorrect";
      }
    
			
  }     
}
?>
