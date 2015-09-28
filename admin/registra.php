<?php
require_once('../settings.php');


$nome=strtolower($_POST['nome']);
$cognome=strtolower($_POST['cognome']);
$usersocio=($_POST['username']);
$data=$_POST['data_di_nascita'];
$paese=$_POST['paese'];
$telefono=$_POST['telefono'];
$attivita=$_POST['attivita'];
$pagato=$_POST['pagato'];

$nome_enc =  base64_encode(strtolower($nome));
$cognome_enc =  base64_encode(strtolower($cognome));
$usersocio_enc = base64_encode(strtolower($usersocio));
    
    

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
	      $query = "select * from clienti where nome='$nome_enc' AND cognome='$cognome_enc' AND username='$usersocio_enc'";
	      $result = $mysqli->query($query);
	      if($result->num_rows >0)
		{
		 echo("Utente già registrato!");
		 header('Refresh: 2; URL=inserisci.php');
		} else {
		//INSERISCO NEL DB

			  $sql = "INSERT INTO clienti (nome, cognome, username, data_di_nascita, telefono, paese, tipo_attivita, pagamento) VALUES (\"$nome_enc\", \"$cognome_enc\", \"$usersocio_enc\", \"$data\", \"$telefono\", \"$paese\", \"$attivita\", \"$pagato\")";

			  if ($mysqli->query($sql) === TRUE) {
			      echo "Utente registrato correttamente";
			      header('Refresh: 2; URL=inserisci.php');
			  } else {
			      echo "Errore inserendo l'utente nel database";
			  }
			  
		      }

$mysqli->close();
?>     
    
