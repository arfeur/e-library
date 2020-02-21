<?php 
/*
   controller.php
   Author: Arthur Dherbomez
   Create the: 20/02
   Description: all the sql request are sent to the controller and it manage them
*/
require_once('bddConnection.php');

function getBooksRequest(){
	$sqlRequest = "SELECT * FROM books";
	return executeSelectRequest($sqlRequest);
}
function getAuthenticationRequest($login,$password){
	$sqlRequest = "SELECT * FROM register WHERE login = '$login'";
	return executeSelectRequest($sqlRequest);
}

function getDeleteRequest($id){
	$sqlRequest = "DELETE FROM books WHERE id=$id";
	return executeSelectRequest($sqlRequest);
}

function getInsertRequest($author,$title,$publisher,$year){
	$sqlRequest = "INSERT INTO books(author, title, year, publisher) VALUES ('$author','$title','$year','$publisher')";
	return executeSelectRequest($sqlRequest);
}

function getResearchRequest(){
	$sqlRequest = "SELECT * FROM books";
  	return executeSelectRequest($sqlRequest);
}

function getPrivilegeRequest($login){
	$sqlRequest = "SELECT privilege FROM register WHERE login = '$login'";
	return executeSelectRequest($sqlRequest);
}

function executeSelectRequest($sqlRequest){
	/*	
		$sqlRequest = request for the sql execution.
		Connection with the sql bdd.
		Execute the request received.
	*/
	$bdd=connectionBDD();
	$request = $bdd->query($sqlRequest); 
	return $request;
}

/*
	Allow to redirect to books.php
*/
$currentpage = $_SERVER['REQUEST_URI'];
if (strpos($currentpage, "controller.php")) {
	header('location: books.php');
}
?>