<?php
echo("registra accesso");


 $nome=$_POST['nome'];
 $cognome=$_POST['cognome'];
 $tessera=$_POST['tessera'];
 
 echo($nome);
 echo($cognome);
 echo($tessera);
 $now = new DateTime();
    echo $now->format('Y-m-d');  
 $data =  $now->format('Y-m-d'); 
 echo ("data: ".$data);
  // MySQL datetime format
    //echo $now->getTimestamp()

    
    

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "palestra";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

//CONTROLLO SE L'UTENTE E' GIA PRESENTE NEL DB
 // SQL query to fetch information of registerd users and finds user match.
	      $query = "select * from clienti where nome='$nome' AND cognome='$cognome' AND num_tessera='$tessera'";
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
		} else {
		//INSERISCO NEL DB

			  $sql = "INSERT INTO clienti (nome, cognome, num_tessera) VALUES (\"$nome\", \"$cognome\", \"$tessera\")";

			  if ($mysqli->query($sql) === TRUE) {
			      echo "New record created successfully";
			  } else {
			      echo "Error: " . $sql . "<br>" . $conn->error;
			  }
		      }

$mysqli->close();
?>     
    
