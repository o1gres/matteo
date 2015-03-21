<?php
require_once('../settings.php');


$nome=strtolower($_POST['nome']);
$cognome=strtolower($_POST['cognome']);
$usersocio=($_POST['username']);
$data=$_POST['data_di_nascita'];
$paese=$_POST['paese'];
$telefono=$_POST['telefono'];

$nome_enc =  base64_encode($nome);
$cognome_enc =  base64_encode($cognome);
    
    

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
	      $query = "select * from clienti where nome='$nome_enc' AND cognome='$cognome_enc' AND username='$usersocio'";
	      $result = $mysqli->query($query);
	      if($result->num_rows >0)
		{
		 echo("Utente già registrato!");
		 header('Refresh: 2; URL=inserisci.php');
		} else {
		//INSERISCO NEL DB

			  $sql = "INSERT INTO clienti (nome, cognome, username, data_di_nascita, telefono, paese) VALUES (\"$nome_enc\", \"$cognome_enc\", \"$usersocio\", \"$data\", \"$telefono\", \"$paese\")";

			  if ($mysqli->query($sql) === TRUE) {
			      echo "Utente registrato correttamente";
			      header('Refresh: 2; URL=inserisci.php');
			  } else {
			      echo "Errore inserendo l'utente nel database";
			  }
			  
		      }

$mysqli->close();
?>     
    
