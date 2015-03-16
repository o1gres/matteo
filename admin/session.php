<?php
require_once('../settings.php');
$mysqli = new mysqli(HOST, USER, PASS, DB);
	      
    // verifica dell'avvenuta connessione
    if (mysqli_connect_errno()) {
	      // notifica in caso di errore
	    echo "Errore in connessione al DBMS: ".mysqli_connect_error();
	      // interruzione delle esecuzioni i caso di errore
	    exit();
    } 

// Starting Session
session_start();
// Storing Session
$user_check=$_SESSION['login_user'];

$query = "select * from access where user='$user_check'";

$result = $mysqli->query($query);

if($result->num_rows >0)
  {
    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
     $login_session =$row['user'];
    }
  }


if(!isset($login_session)){
$_SESSION['message'] = 'Your message';
   mysqli_close($mysqli);
    $_SESSION['message'] = 'Your message';
    header('Location: index.php?msg="error"'); // Redirecting To Home Page
    }
?>