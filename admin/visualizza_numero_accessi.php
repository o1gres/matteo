<?php 
require_once('../settings.php');


$dal=$_POST['dal'];
$al=$_POST['al'];

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
		  <a href="visualizza_accessi.php" class="btn btn-primary">Indietro </a>
		  <a href="../logout.php" class="btn btn-danger">Esci </a>
		</div>		
				
                <div class="thumbnail"  style="border: none;">
					
                    <img class="img-responsive" src="../img/logo_pf.jpg" alt="" style="width:30%; margin-bottom:5%;">
                    
                    <div class="col-md-2 col-md-offset-2">

<?php
//CONTO IL NUMERO DI ACCESSI
$result = $mysqli->query("SELECT COUNT(*) AS num FROM accessi WHERE data BETWEEN '$dal' AND '$al'");
$row = $result->fetch_assoc();

$sql = "SELECT *, COUNT(*) AS num_accessi FROM clienti INNER JOIN accessi ON clienti.id=accessi.cliente WHERE data>='$dal' AND data <='$al' GROUP BY clienti.id ORDER BY tipo_attivita ASC
";
	    $result1 = $mysqli->query($sql);
	    if($result1->num_rows >0){
	    ?>
	    <table class="stat_accessi">
	      <tr>
		<td>Nome</td>
		<td>Cognome</td>
		<td>Numero accessi</td>
		<td>Tipo di attività</td>
		<td>Pagamenti</td>

	      </tr>
	    <?php
	      while($row = $result1->fetch_array(MYSQLI_ASSOC)){
	      ?>
	      <tr>
		  <td> <?php echo(base64_decode($row['nome'])); ?> </td>
		  <td> <?php echo(base64_decode($row['cognome'])); ?> </td>
		  <td> <?php echo($row['num_accessi']); ?> </td>
		  <td> <?php echo($row['tipo_attivita']); ?> </td>
		  <td> <?php echo($row['pagamento']); ?> </td>
		  
	      <?php
		//echo(base64_decode($row['nome'])."".base64_decode($row['cognome'])."".$row['paese']."".$row['tipo_attivita']."".$row['pagamento']."".$row['num_accessi']."<br> <br>");
	      ?>
	      </tr>
	      <?php
	      } 
	      ?>
	      
	      </table>
	      
	      <?php
	    }  
?>
<div class="num_access">
<?php
  //echo "Dal ".$dal." al ".$al." sono stati effettuati: ". $row['num']." accessi";   
?>
</div>


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
