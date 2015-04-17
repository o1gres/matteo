<?php

/**
*	Author: Sergio Cordedda
*	Date: March 2015
*	email: cor.se@hotmail.it
*	Description: Discriminatory HTML page to show a choise for user, to do an acces as administrator or  as Socio.
*
*/


require_once ("session.php");

session_start();
if(!isset($_SESSION['login_user'])){
//echo ($_SESSION['login_user']);
header("location: index.php");
} else {
unset($_SESSION['message']);
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

    <title>Accesso</title>

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
	    
		<div class="esci">
		  <a href="logout.php" class="btn btn-danger">Esci </a>
		</div>		
		
                <div class="thumbnail"  style="border: none;">
					
                    <img class="img-responsive" src="img/logo_pf.jpg" alt="" style="width:30%; margin-bottom:5%;">
                    
                    <div class="col-md-2 col-md-offset-5">
		      
		      <div>
			<a href="admin/index.php" id="admin" class="admin button btn btn-primary">Admin</a>
		     
			<a href="accesso.php" id="socio" class="socio button btn btn-primary">Socio</a>
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