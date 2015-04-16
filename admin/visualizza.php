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

    <title>Registra socio</title>

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
		  <a href="../logout.php" class="btn btn-danger">Esci </a>
		</div>
				
                <div class="thumbnail"  style="border: none;">
					
                    <img class="img-responsive" src="../img/logo_pf.jpg" alt="" style="width:30%; margin-bottom:5%;">
                    
                    <div class="col-md-2 col-md-offset-5">
                    <a href="index.php" class="btn btn-primary" style="margin-bottom: 20px;"> Torna ad Amministrazione </a>
		      <div>
			<div class="registra_utente" id="reistra_utente" style="font-size: 20px; font-weight: bold">Visualizza Socio</div>
			
			<form id="stats" name="stats" action="statistiche.php" method="post">
			  
			  <div class="error bottom">
			      <span class="errore">
				  <?php
				  /*
				    if (isset($_SESSION['message']))
				      {
					  echo $_SESSION['message'];
					  unset($_SESSION['message']);
				      }	
				  */    
				  ?>
				    
			      </span>
			  </div>
		      
			  <div class="user bottom">
			      <label for="nome" class="user">Nome: </label>
			      <input type="text" id="nome" name="nome" required/>
			  </div>
			  
			  <div class="password bottom">
			      <label for="cognome" class="password">Cognome: </label>
			      <input type="text" id="cognome" name="cognome" required/>
			  </div>
			  
			  <div class="tessera bottom">
			      <label for="username" class="username">Username: </label>
			      <input type="text" id="username" name="username" required/>
			  </div>
			  <!--
			  <div class="data bottom">
			      <label for="dal" class="data">Dal: </label>
			      <input type="text" id="dal" name="dal" required/>
			  </div>
			  
			  <div class="paese bottom">
			      <label for="al" class="password">Al: </label>
			      <input type="text" id="al" name="al" required/>
			  </div>
			  -->			  
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

