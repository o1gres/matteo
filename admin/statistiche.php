<?php 
require_once('../settings.php');

$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$tessera=$_POST['tessera'];
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
$query = "select * from clienti where nome='$nome_enc' AND cognome='$cognome_enc' AND num_tessera='$tessera'";
    $result = $mysqli->query($query);
    if($result->num_rows >0)
      {
      
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	echo($nome." ".$cognome."<br><br>");
	
	  $user_id = $row['id'];
	  $sql = "SELECT * FROM accessi WHERE cliente='$user_id'";
	  $result1 = $mysqli->query($sql);
	  if($result1->num_rows >0){
	  $num_accessi = 0;
	     while($row = $result1->fetch_array(MYSQLI_ASSOC)){
		$num_accessi++;
		echo(" - ".$row['data']."<br>");
	     } 
	  
	  }
	  
	}
      }
?>