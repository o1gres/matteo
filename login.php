<?php
echo ("sono a monte");
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

  if (!isset($_POST['submit'])) {
      echo("post?");
      if (empty($_POST['uname']) || empty($_POST['upass'])) {
	  $error = "Username or Password is invalid";
	  echo($error);
      } else {
	      echo("sono nel else");
	      // Define $username and $password
	      $username=$_POST['root'];
	      $password=$_POST['root'];
	      
	      // Establishing Connection with Server by passing server_name, user_id and password as a parameter
	      $connection = mysql_connect("localhost", "root", "root");
	      
	      // To protect MySQL injection for Security purpose
	      $username = stripslashes($username);
	      $password = stripslashes($password);
	      $username = mysql_real_escape_string($username);
	      $password = mysql_real_escape_string($password);
	      
	      // Selecting Database
	      $db = mysql_select_db("palestra", $connection);
	      
	      // SQL query to fetch information of registerd users and finds user match.
	      $query = mysql_query("select * from access where pass='$password' AND user='$username'", $connection);
	      $rows = mysql_num_rows($query);
	      
	      
	      
	      if ($rows == 1) {
		  $_SESSION['login_user']=$username; // Initializing Session
		  header("location: profile.php"); // Redirecting To Other Page
	      } else {
		      $error = "Username or Password is invalid";
		      }
	      mysql_close($connection); // Closing Connection
	      }
  }
?>