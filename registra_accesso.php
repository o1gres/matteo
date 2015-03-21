<?php
require_once('settings.php');



 $usersocio=$_POST['tessera'];
 $now = new DateTime();
 $data =  $now->format('Y-m-d'); 
  // MySQL datetime format
    //echo $now->getTimestamp()
   

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
	      $query = "SELECT * FROM clienti WHERE username='$usersocio'";
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
			    header("Refresh: 0; URL=accessocorretto.php?nome=$a&cognome=$b");
			  } else {
			      echo "Error: " . $sql . "<br>" . $conn->error;
			  }
		  }
		} else {

		  header('Refresh: 0; URL=usersocioerror.php');
		  }
		
		
		
		/*
			  //INSERISCO NEL DB

			  $sql = "INSERT INTO clienti (nome, cognome, num_tessera) VALUES (\"$nome_enc\", \"$cognome_enc\", \"$tessera\")";

			  if ($mysqli->query($sql) === TRUE) {
			      echo "New record created successfully";
			  } else {
			      echo "Error: " . $sql . "<br>" . $conn->error;
			  }
			  
			  
			  //REGISTRO IL PRIMO ACCESSO
			  $query = "select * from clienti where nome='$nome_enc' AND cognome='$cognome_enc' AND num_tessera='$tessera'";
			  $result = $mysqli->query($query);
			  if($result->num_rows >0)
			    {
			      while($row = $result->fetch_array(MYSQLI_ASSOC))
			      {
			      $user_id = $row['id'];
			      echo("id1: ".$user_id);
			      $sql = "INSERT INTO accessi (cliente, data) VALUES (\"$user_id\", \"$data\")";
			      if ($mysqli->query($sql) === TRUE) {
					header("location: accesso.php");
				      } else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
				      }
			      }
			    }
		        */

$mysqli->close();
?>     
    
