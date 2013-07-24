<?php

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'notatki');
 
function db_connect() {
    mysql_connect(DBHOST, DBUSER, DBPASS) or die('<h2>ERROR</h2>');
 
    mysql_select_db(DBNAME) or die('<h2>ERROR</h2>');
}
 
function db_close() {
    mysql_close();
}
 
function clear($text) {
    //slash
    if(get_magic_quotes_gpc()) {
        $text = stripslashes($text);
    }
    //biale znaki
    $text = trim($text);
    //sql injection
    $text = mysql_real_escape_string($text);
    //kod html  
    $text = htmlspecialchars($text);
    return $text;
}

function get_id(){
  	$url = $_SERVER["REQUEST_URI"];
    $b=explode('?', $url);
	  parse_str($b[1], $out);
 	  return $out['id'];
}
 
?>