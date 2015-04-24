<?php
require_once('../settings.php');


$userid=($_POST['userid']);
$attivita=($_POST['edit_attivita']);
$pagati=($_POST['edit_pagamento']);
$telefono=($_POST['telefono']);
$paese=($_POST['paese']);
   

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
                    
                    <div class="col-md-2 col-md-offset-3">
<?php
//CONTROLLO SE L'UTENTE E' GIA PRESENTE NEL DB

//CERCO L'UTENTE NEL DATABASE
$sql = "UPDATE clienti SET tipo_attivita='$attivita', pagamento='$pagati', paese='$paese', telefono='$telefono' WHERE id='$userid'";
if ($mysqli->query($sql) === TRUE) {
    echo "Dati aggiornati correttamente";
} else {
    echo "Errore aggiornando i dati: " . $conn->error;
}
?>    


<?php
//CERCO L'UTENTE NEL DATABASE
	  $sql3 = "SELECT * FROM clienti WHERE id='$userid'";  
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
	    <tr>
	    <form id="<?php echo($user_id); ?>" name="<?php echo($user_id); ?>" action="edit_socio.php" method="post">
	      <tr>
		<input type="hidden" id="userid" name="userid" value="<?php echo($user_id); ?>" />
		<td> <?php echo($row3['data_di_nascita']); ?> </td>
		<td> <?php echo($row3['paese']); ?> </td>
		<td> <?php echo($row3['telefono']); ?> </td>
		<td> 
		  <?php echo($row3['tipo_attivita']);?>
		</td>
		<td> 
		  <?php echo($row3['pagamento']);?>
		</td>  
	      <tr>
	    </form>
	  <table>

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

    
