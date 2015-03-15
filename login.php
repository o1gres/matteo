<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

  if (!isset($_POST['submit'])) {   
      
      if (empty($_POST['uname']) || empty($_POST['upass'])) {
	  $error = "Username or Password is invalid";
	  //echo($error);
      } else {
	      // Define $username and $password
	      $username=$_POST['uname'];
	      $password=$_POST['upass'];
	      
	      // Establishing Connection with Server by passing server_name, user_id and password as a parameter
	      $mysqli = new mysqli("localhost", "root", "root", "palestra");
	      
	      // verifica dell'avvenuta connessione
	      if (mysqli_connect_errno()) {
			// notifica in caso di errore
		      echo "Errore in connessione al DBMS: ".mysqli_connect_error();
			// interruzione delle esecuzioni i caso di errore
		      exit();
	      } 
		    
	      // SQL query to fetch information of registerd users and finds user match.
	      $query = "select * from access where pass='$password' AND user='$username'";
	      $result = $mysqli->query($query);
	      
	      if($result->num_rows >0)
		{
		  while($row = $result->fetch_array(MYSQLI_ASSOC))
		  {
		   $_SESSION['login_user']=$row['user']; // Initializing Session
		   header("location: profile.php");
		  }
		} else {
			
			$_SESSION['message'] = 'Nome utente o password errati!';
			mysqli_close($mysqli);
			}
	      }
	 
  }
?>