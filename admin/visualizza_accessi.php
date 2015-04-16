<?php
require_once ("../session.php");

session_start();
if(!isset($_SESSION['login_user'])){
header("location: ../index.php");
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

    <title>Visualizza accessi</title>

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
	


</head>

<body>

    <!-- Navigation -->
  

    <!-- Page Content -->
    <div class="container">
		
		
        <div class="row">
			
	    <div class="col-md-9" style="width: 100%;">
	    
		<div class="esci">
		  <a href="../logout.php" class="btn btn-danger">Esci </a>
		</div>
				
                <div class="thumbnail"  style="border: none;">
					
                    <img class="img-responsive" src="../img/logo_pf.jpg" alt="" style="width:30%; margin-bottom:5%;">
                    
                    <div class="col-md-2 col-md-offset-5">
                    <a href="index.php" class="btn btn-primary" style="margin-bottom: 20px;"> Torna ad Amministrazione </a>
		      <div>
			<div class="registra_utente" id="reistra_utente" style="font-size: 20px; font-weight: bold">Visualizza numero accessi</div>
			
			<form id="stats" name="stats" action="visualizza_numero_accessi.php" method="post">
			  
			  <div class="error bottom">
			      <span class="errore">
			  </div>
	  
			  <div class="data bottom">
			      <label for="dal" class="data">Dal: </label>
			      <input type="text" id="dal" name="dal" required/>
			  </div>
			  
			  <div class="paese bottom">
			      <label for="al" class="password">Al: </label>
			      <input type="text" id="al" name="al" required/>
			  </div>
			  			  
			  <div class="invia">
			      <input type="submit" id="visualizza" class="visualizza" value="Visualizza"/>
			  </div>
			
		      </form>
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
    
    <!-- date picker -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

    
    <script type="text/javascript">
    var date = $('#dal, #al').datepicker({ dateFormat: 'yy-mm-dd' }).val();
    </script>
</body>

</html>

 
