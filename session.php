 <?php 
 
 /**
*	Author: Sergio Cordedda
*	Date: March 2015
*	email: cor.se@hotmail.it
*	Description: Store session into database table.
*
*/ 
 
require_once('settings.php'); 
  
$mysqli = new mysqli(HOST, USER, PASSWORD, DB);

session_set_save_handler( '_open',
			  '_close',                
			  '_read',
			  '_write',
			  '_destroy',
			  '_clean'); 

 
/*APER LA CONNESSIONE CON IL DB*/ 
function _open(){    
    //echo "open";
    global $_sess_db;     
    
    if ($_sess_db = mysql_connect(HOST, USER, PASSWORD)) {        
	return mysql_select_db(DB, $_sess_db);  
	//echo ("sono connesso");
    }  
    //else echo ("problema connessione");
    
    return FALSE;
    } 
    
function _close(){    
    //echo "close";
    global $_sess_db;     
    return mysql_close($_sess_db);
    } 
    

    
function _read($id){    
    //echo "read";
    global $_sess_db;     
    $id = mysql_real_escape_string($id);     
    $sql = "SELECT data FROM sessions WHERE  id = '$id'";     
    
    if ($result = mysql_query($sql, $_sess_db)) {        
	if (mysql_num_rows($result)) {            
	    $record = mysql_fetch_assoc($result);             
	    return $record['data'];        
	}    
    }     
    return '';
    }   
    
    
    
function _write($id, $data)
{

    //echo "write";
    global $_sess_db;
 
    $access = time();
 
    $id = mysql_real_escape_string($id);
    $access = mysql_real_escape_string($access);
    $data = mysql_real_escape_string($data);
 
    $sql = "REPLACE
            INTO    sessions
            VALUES  ('$id', '$access', '$data')";
 
    return mysql_query($sql, $_sess_db);
}



function _destroy($id)
{
    //echo "destroy";
    global $_sess_db;
 
    $id = mysql_real_escape_string($id);
 
    $sql = "DELETE
            FROM   sessions
            WHERE  id = '$id'";
 
    return mysql_query($sql, $_sess_db);
}




function _clean($max)
{
    //echo "clean";
    global $_sess_db;
 
    $old = time() - $max;
    $old = mysql_real_escape_string($old);
 
    $sql = "DELETE
            FROM   sessions
            WHERE  access < '$old'";
 
    return mysql_query($sql, $_sess_db);
}
    

    
?>