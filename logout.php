<?php

/**
*	Author: Sergio Cordedda
*	Date: March 2015
*	email: cor.se@hotmail.it
*	Description: Destroy authentication session.
*
*/

require_once('session.php');
session_start();
if(session_destroy()) // Destroying All Sessions
{
  header("Location: index.php"); // Redirecting To Home Page
}
?> 
