<?php
require_once('../settings.php');


$nome=strtolower($_POST['nome']);
$cognome=strtolower($_POST['cognome']);
$usersocio=($_POST['username']);
$anno=$_POST['anni'];
$mese=$_POST['mesi'];

$nome_enc =  base64_encode($nome);
$cognome_enc =  base64_encode($cognome);
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

//CERCO L'UTENTE NEL DATABASE
$query = "select * from clienti where LOWER(nome)='$nome_enc' AND LOWER(cognome)='$cognome_enc' AND LOWER(username)='$usersocio_enc'";
    $result = $mysqli->query($query);
    if($result->num_rows >0)
      {
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	
	  $user_id = $row['id'];
	  $sql = "SELECT * FROM pagamenti WHERE cliente='$user_id' AND mese='$mese' AND anno='$anno'";
	  $result1 = $mysqli->query($sql);
	  if($result1->num_rows >0){
	     echo("l'utente $nome $cognome ha gia' pagato questo mese");
	     header('Refresh: 3; URL=pagamenti_aggiunta.php');
	     } else {
		    $sql = "INSERT INTO pagamenti (cliente, mese, anno, pagato) VALUES (\"$user_id\", \"$mese\", \"$anno\", \"1\")";

			  if ($mysqli->query($sql) === TRUE) {
			      echo "Pagamento aggiunto correttamente";
			      header('Refresh: 3; URL=pagamenti_scelta.php');
			  } else {
			      echo "Errore inserendo l'utente nel database";
			  }
		    }
	  
	  
	  } 
	  
	}
      


/*
 // SQL query to fetch information of registerd users and finds user match.
	      $query = "select * from pagamenti where nome='$nome_enc' AND cognome='$cognome_enc' AND username='$usersocio_enc'";
	      $result = $mysqli->query($query);
	      if($result->num_rows >0)
		{
		 echo("Utente già registrato!");
		 header('Refresh: 2; URL=inserisci.php');
		} else {
		//INSERISCO NEL DB

			  $sql = "INSERT INTO clienti (nome, cognome, username, data_di_nascita, telefono, paese) VALUES (\"$nome_enc\", \"$cognome_enc\", \"$usersocio_enc\", \"$data\", \"$telefono\", \"$paese\")";

			  if ($mysqli->query($sql) === TRUE) {
			      echo "Utente registrato correttamente";
			      header('Refresh: 2; URL=inserisci.php');
			  } else {
			      echo "Errore inserendo l'utente nel database";
			  }
			  
		      }

$mysqli->close();
*/
?>     
    
