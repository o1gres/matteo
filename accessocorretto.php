<?php

/**
*	Author: Sergio Cordedda
*	Date: March 2015
*	email: cor.se@hotmail.it
*	Description: PHP page to make login, redirect to first privare page.
*
*/

require_once ("session.php");

session_start();
if(!isset($_SESSION['login_user'])){
header("location: index.php");
}

if(!isset($_SESSION['message'])){
header("location: accesso.php");
}

$nome=$_GET['nome'];
$cognome=$_GET['cognome'];
$usersocio_enc = $_GET['user'];

$today = date('Y-m');



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

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">
	
	<!-- Main CSS -->
	<link href="css/main.css" rel="stylesheet">

    <!-- jQuery -->
    
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	
    <!-- Personal Javascript> -->
    <script type="text/javascript" src="js/main.js"></script>
	
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
				
                <div class="thumbnail"  style="border: none;">
					
                    <img class="img-responsive" src="img/logo_pf.jpg" alt="" style="width:30%; margin-bottom:5%;">
                    
                    <div class="col-md-2 col-md-offset-5">
                    
		      <div>
			  <div class="benvenuto">
			  Benvenuto
			  <span class="upper"><?php echo("$nome") ?></span>
			  <span class="upper"><?php echo("$cognome") ?></span>
			  <br><br>
			  <?php
			  
						      //CERCO L'UTENTE NEL DATABASE
			  $query = "select * from clienti where LOWER(username)='$usersocio_enc'";
			      $result = $mysqli->query($query);
			      if($result->num_rows >0)
				{
				  while($row = $result->fetch_array(MYSQLI_ASSOC))
				  {    
				    $user_id = $row['id'];
				    $result = $mysqli->query("SELECT COUNT(*) AS num FROM accessi WHERE cliente='$user_id' AND data LIKE '$today%'");
				    $row = $result->fetch_assoc();
				    echo "In questo mese hai effettuato ". $row['num']." accessi";   	      
				  }
				unset($_SESSION['message']);
				}
			  
			    header("Refresh: 4; URL=accesso.php");
			  ?>
			  </div>
		      </div>
		      
		    </div>
		    
	        </div>
	    </div>
	</div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
