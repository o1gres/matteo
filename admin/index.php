<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: accesso.php");
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
				
                <div class="thumbnail"  style="border: none;">
					
                    <img class="img-responsive" src="../img/logo_pf.jpg" alt="" style="width:30%; margin-bottom:5%;">
                    
                    <div class="caption-full">
                    
		      <form id="submit" name="submit" action="" method="post">
			  
			  <div class="error bottom">
			      <span class="errore">
				  <?php
				  if (isset($_SESSION['message']))
				    {
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				    }	
				    ?>
			      </span>
			  </div>
		      
			  <div class="user bottom">
			      <label for="auname" class="user">User:</label>
			      <input type="text" id="auname" name="auname" onclick="remove_red_l();"/>
			  </div>
			  
			  <div class="password bottom">
			      <label for="aupass" class="password">Password: </label>
			      <input type="password" id="aupass" name="aupass" onclick="remove_red_p();"/>
			  </div>
			  
			  <div class="invia">
			      <input type="submit" id="accedi" class="accedi" value="Login" onclick="return check_l_p();" />
			  </div>
		      </form>
                        
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
