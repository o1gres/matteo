<?php 
require_once('../settings.php');

$nome=strtolower($_POST['nome']);
$cognome=strtolower($_POST['cognome']);
$usersocio=strtolower($_POST['username']);
$dal=$_POST['dal'];
$al=$_POST['al'];

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


//CERCO L'UTENTE NEL DATABASE
$query = "select * from clienti where LOWER(nome)='$nome_enc' AND LOWER(cognome)='$cognome_enc' AND LOWER(username)='$usersocio'";
    $result = $mysqli->query($query);
    if($result->num_rows >0)
      {
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	echo($nome." ".$cognome."<br><br>");
	
	  $user_id = $row['id'];
	  $sql = "SELECT * FROM accessi WHERE cliente='$user_id' AND data BETWEEN '$dal' AND '$al'";
	  $sql2 = "SELECT COUNT(*) AS num FROM accessi WHERE cliente='$user_id' AND data BETWEEN '$dal' AND '$al'";
	  $result1 = $mysqli->query($sql);
	  $result2 = $mysqli->query($sql2);  
	  if($result1->num_rows >0){
	  $num_accessi = 0;
	  $row2 = $result2->fetch_array(MYSQLI_ASSOC);
	  echo ("Ha effettuato ". $row2['num']." accessi <br><br>"); 
	     while($row = $result1->fetch_array(MYSQLI_ASSOC)){
		$num_accessi++;
		echo(" - ".$row['data']."<br>");
	     } 
	  
	  
	  } else {
	    echo "Nessun accesso nel periodo selezionato";
	  }
	  
	}
      }
?>