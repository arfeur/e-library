<?php
/*
   login.php
   Author: Arthur Dherbomez
   Create the: 20/02
   Description: Represent the form of the connection for the user
*/
require_once('authentication.php'); 
?>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<center>
		<h1> Welcome to the e-Library </h1>
			<div class="formulaire">
				<form method="post">
					<label for="login"> Name: </label>
						<input type="text" name="login"> 
					<label for="password"> Password: </label> 
						<input type="password" name="password">
						<input type="submit" value="Validate" name="submit">
				</form>
			</div>
	</center>
</body>
</html>

<?php verif();?>
