<?php

/**
*	Author: Sergio Cordedda
*	Date: March 2015
*	email: cor.se@hotmail.it
*	Description: Authentication Page.
*
*/

//session_set_save_handler ("open", "close", "read", "write", "destroy", "gc");
require_once('settings.php');
require_once('session.php');

$error=''; // Variable To Store Error Message
  if (!isset($_POST['submit'])) {   
      if (empty($_POST['uname']) || empty($_POST['upass'])) {
print_r($_POST['uname']);
	  $error = "Username or Password is invalid";
	  //echo($error);
      } else {
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
print_r($result);
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
			session_start(); // Starting Session
			$_SESSION['message'] = 'Nome utente o password errati!';
			header('Refresh: 0; URL=index.php');
			mysqli_close($mysqli);
			}
	      }
	 
  }
?>
