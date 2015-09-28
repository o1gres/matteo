<?php 
require_once('../settings.php');

require_once ("../session.php");

session_start();
if(!isset($_SESSION['login_user'])){
header("location: ../index.php");
}

$nome=strtolower($_POST['nome']);
$cognome=strtolower($_POST['cognome']);
$usersocio=strtolower($_POST['username']);
//$dal=$_POST['dal'];
//$al=$_POST['al'];


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

?>

<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Statistiche</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/shop-item.css" rel="stylesheet">
	
	<!-- Main CSS -->
	<link href="../css/main.css" rel="stylesheet">

    <!-- jQuery -->
    
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
	
    <!-- Personal Javascript> -->
    <script type="text/javascript" src="../js/main.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
  

    <!-- Page Content -->
    <div class="container">
		
		
        <div class="row">
			
	    <div class="col-md-9" style="width: 100%;">
				
		<div class="esci">
		  <a href="visualizza.php" class="btn btn-primary">Indietro </a>
		  <a href="../logout.php" class="btn btn-danger">Esci </a>
		</div>		
				
                <div class="thumbnail"  style="border: none;">
					
                    <img class="img-responsive" src="../img/logo_pf.jpg" alt="" style="width:30%; margin-bottom:5%;">
                    
                    <div class="col-md-2 col-md-offset-2">

<?php
//CERCO L'UTENTE NEL DATABASE
//print_r($nome_enc);
$query = "select * from clienti where LOWER(nome)='$nome_enc' AND LOWER(cognome)='$cognome_enc' AND LOWER(username)='$usersocio_enc'";
    $result = $mysqli->query($query);
    //print_r($result);
    if($result->num_rows >0)
      {
	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
	echo($nome." ".$cognome."<br><br>");
	
	  $user_id = $row['id'];
	  //$sql = "SELECT * FROM accessi WHERE cliente='$user_id' AND data BETWEEN '$dal' AND '$al'";
	  $sql = "SELECT * FROM accessi WHERE cliente='$user_id'";
	  //$sql2 = "SELECT COUNT(*) AS num FROM accessi WHERE cliente='$user_id' AND data BETWEEN '$dal' AND '$al'";
	  $sql2 = "SELECT COUNT(*) AS num FROM accessi WHERE cliente='$user_id'";
	  $sql3 = "SELECT * FROM clienti WHERE username='$usersocio_enc'";
	  $result1 = $mysqli->query($sql);
	  $result2 = $mysqli->query($sql2);  
	  $result3 = $mysqli->query($sql3);  
	  $row3 = $result3->fetch_array(MYSQLI_ASSOC);
	  ?>
	  <table class="stat_accessi">
	    <tr>
	      <td>Data di nasciata</td>
	      <td>Paese</td>
	      <td>Telefono</td>
	      <td>Tipo di attività</td>
	      <td>Pagamenti</td>
	      <td>Modifica</td>
	    <tr>
	    <form id="<?php echo($user_id); ?>" name="<?php echo($user_id); ?>" action="edit_socio.php" method="post">
	      <tr>
		<input type="hidden" id="userid" name="userid" value="<?php echo($user_id); ?>" />
		<td> <?php echo($row3['data_di_nascita']); ?> </td>
		<td> <input type="text" name="paese" value="<?php echo($row3['paese']); ?>" style="width: 150px;"></input> </td>
		<td> <input type="text" name="telefono" value="<?php echo($row3['telefono']); ?>" style="width: 150px;"> </input> </td>
		<td> 
		  <textarea id="edit_attivita" name="edit_attivita"><?php echo($row3['tipo_attivita']);?></textarea>
		</td>
		<td> 
		  <textarea id="edit_pagamento" name="edit_pagamento"><?php echo($row3['pagamento']);?></textarea>
		</td>  
		<td>
		  <input type="submit" value="OK" style="width: 50px; height: 25px;">
		</td>
	      <tr>
	    </form>
	  <table>
	  <?php
	  //echo($row3['data_di_nascita']." - ".$row3['paese']." - ".$row3['telefono']." - ".$row3['tipo_attivita']." - ".$row3['pagamento']);
	  if($result1->num_rows >0){
	  /*$num_accessi = 0;
	  $row2 = $result2->fetch_array(MYSQLI_ASSOC);
	  echo ("Ha effettuato ". $row2['num']." accessi <br><br>"); 
	     while($row = $result1->fetch_array(MYSQLI_ASSOC)){
		$num_accessi++;
		echo(" - ".$row['data']."<br>");
	     } 
	  
	  */

	  } else {
	    //echo "Nessun accesso nel periodo selezionato";
	  }
	  
	}
      }
?>
 </div>
		    
	        </div>
	    </div>
	</div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
