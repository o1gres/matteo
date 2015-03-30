<?php

//session_set_save_handler ("open", "close", "read", "write", "destroy", "gc");
require_once('settings.php');
require_once('session.php');

$error=''; // Variable To Store Error Message
  if (!isset($_POST['submit'])) {   
      if (empty($_POST['uname']) || empty($_POST['upass'])) {
	  $error = "Username or Password is invalid";
	  //echo($error);
      } else {
	      echo ("ciao2");
	      // Define $username and $password
	      $username=$_POST['uname'];
	      $password=md5($_POST['upass']);
	      
	      // Establishing Connection with Server by passing server_name, user_id and password as a parameter
	      $mysqli = new mysqli(HOST, USER, PASSWORD, DB);
	      
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
		  
		   //$_SESSION['login_user']=$row['user']; // Initializing Session
		   session_start(); // Starting Session
		   $_SESSION['login_user'] = 'user_session_acmove';
		   header("location: scelta.php");
		  }
		} else {
			
			$_SESSION['message'] = 'Nome utente o password errati!';
			mysqli_close($mysqli);
			}
	      }
	 
  }
?>