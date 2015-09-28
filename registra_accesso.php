<?php

/**
*	Author: Sergio Cordedda
*	Date: March 2015
*	email: cor.se@hotmail.it
*	Description: Save new user on the database.
*
*/

require_once('session.php');
require_once('settings.php');

 $usersocio=strtolower($_POST['tessera']);
 $now = new DateTime();
 $data =  $now->format('Y-m-d'); 
  // MySQL datetime format
    //echo $now->getTimestamp()
    
$usersocio_enc = base64_encode($usersocio);
   

$servername = HOST;
$username = USER;
$password = PASSWORD;
$dbname = DB;

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

//CONTROLLO SE L'UTENTE E' GIA PRESENTE NEL DB
 // SQL query to fetch information of registerd users and finds user match.
	      $query = "SELECT * FROM clienti WHERE username='$usersocio_enc'";
	      $result = $mysqli->query($query);
	      if($result->num_rows >0)
		{
		  while($row = $result->fetch_array(MYSQLI_ASSOC))
		  {
		   $a = base64_decode($row['nome']);
		   $b = base64_decode($row['cognome']);
		  		   
		   $user_id = $row['id'];
		   $sql = "INSERT INTO accessi (cliente, data) VALUES (\"$user_id\", \"$data\")";
		   if ($mysqli->query($sql) === TRUE) {
			    session_start();
			    $_SESSION['message'] = 'bene';
			    header("Refresh: 0; URL=accessocorretto.php?nome=$a&cognome=$b&user=$usersocio_enc");
			  } else {
			      echo "Error: " . $sql . "<br>" . $conn->error;
			  }
		  }
		} else {

		  header('Refresh: 0; URL=usersocioerror.php');
		  }

$mysqli->close();
?>     
    
